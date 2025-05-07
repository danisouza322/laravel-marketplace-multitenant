# Implementação Multi-Tenant

## Conceito

O sistema multi-tenant permite que múltiplos lojistas (tenants) compartilhem a mesma aplicação, mantendo seus dados isolados. Nesta implementação, utilizaremos uma abordagem baseada em tenant_id.

## Estrutura de Banco de Dados

### Tabela de Tenants

```php
Schema::create('tenants', function (Blueprint $table) {
    $table->id();
    $table->string('nome');
    $table->string('slug')->unique();
    $table->string('whatsapp');
    $table->string('logo')->nullable();
    $table->string('banner')->nullable();
    $table->string('cidade');
    $table->text('descricao')->nullable();
    $table->boolean('ativo')->default(true);
    $table->timestamps();
});
```

### Relação com Usuários

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->unsignedBigInteger('tenant_id')->nullable();
    $table->foreign('tenant_id')->references('id')->on('tenants');
    $table->boolean('is_admin')->default(false);
    $table->rememberToken();
    $table->timestamps();
});
```

## Implementação do Middleware

### Middleware Tenant

Este middleware garante que um usuário só acesse dados do seu próprio tenant:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->tenant_id === null) {
            return redirect('/login');
        }
        
        // Define tenant_id global para todas as queries
        app()->singleton('tenant_id', function () {
            return auth()->user()->tenant_id;
        });
        
        return $next($request);
    }
}
```

### Middleware Admin

Para o acesso do administrador:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/login');
        }
        
        return $next($request);
    }
}
```

## Registro de Middlewares

No arquivo `app/Http/Kernel.php`:

```php
protected $routeMiddleware = [
    // ... outros middlewares
    'tenant' => \App\Http\Middleware\TenantMiddleware::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];
```

## Global Scopes

Para garantir isolamento de dados, utilizamos Global Scopes nos modelos:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // ...
    
    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (app()->has('tenant_id') && !auth()->user()->is_admin) {
                $builder->where('tenant_id', app('tenant_id'));
            }
        });
    }
}
```

## Rotas e Controllers

### Rotas para Lojistas

```php
Route::prefix('dashboard')
    ->middleware(['auth', 'tenant'])
    ->group(function () {
        // Rotas de acesso do lojista
    });
```

### Rotas para Admin

```php
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Rotas de acesso do administrador
    });
```

## Testes de Isolamento de Dados

Implemente testes para garantir que um lojista não consiga acessar dados de outro:

```php
public function test_tenant_can_only_see_own_products()
{
    $tenant1 = Tenant::factory()->create();
    $tenant2 = Tenant::factory()->create();
    
    $user1 = User::factory()->create(['tenant_id' => $tenant1->id]);
    
    $produto1 = Produto::factory()->create(['tenant_id' => $tenant1->id]);
    $produto2 = Produto::factory()->create(['tenant_id' => $tenant2->id]);
    
    $this->actingAs($user1);
    
    $this->get('/dashboard/produtos')
         ->assertSee($produto1->nome)
         ->assertDontSee($produto2->nome);
}
``` 