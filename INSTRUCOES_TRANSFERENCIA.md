# Instruções para Transferência do Projeto

Este documento contém as instruções necessárias para transferir o projeto para outra máquina e continuar o desenvolvimento.

## Opção 1: Clonar do GitHub (Recomendado)

A maneira mais fácil é clonar o repositório diretamente do GitHub:

```bash
git clone https://github.com/danisouza322/laravel-marketplace-multitenant.git
cd laravel-marketplace-multitenant
```

## Opção 2: Transferir Arquivos Manualmente

Se preferir transferir os arquivos manualmente, aqui estão os diretórios e arquivos essenciais:

### Diretórios principais:
- `app/` - Contém os modelos, controladores e middlewares
- `resources/` - Contém as views e assets
- `routes/` - Contém as definições de rotas
- `database/` - Contém as migrações e seeders
- `config/` - Contém arquivos de configuração
- `public/` - Contém arquivos públicos acessíveis pela web

### Arquivos de configuração:
- `.env.example` - Modelo para o arquivo de configuração
- `composer.json` - Dependências PHP
- `package.json` - Dependências JavaScript
- `webpack.mix.js` - Configuração de compilação de assets

### Arquivos do repositório:
- `README.md` - Documentação principal
- `CONTRIBUTING.md` - Guia de contribuição
- `.gitignore` - Arquivos ignorados pelo Git
- `docs/` - Documentação adicional

## Passos após transferência

1. Instalar dependências:
```bash
composer install
npm install && npm run dev
```

2. Configurar ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

3. Configurar banco de dados no arquivo `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketplace_multitenant
DB_USERNAME=root
DB_PASSWORD=
```

4. Executar migrações:
```bash
php artisan migrate --seed
```

5. Configurar storage para uploads:
```bash
php artisan storage:link
```

## Arquivos críticos do sistema

### Modelos:
- `app/Models/Tenant.php` - Modelo do lojista/tenant
- `app/Models/User.php` - Modelo de usuário
- `app/Models/Produto.php` - Modelo de produto
- `app/Models/Categoria.php` - Modelo de categoria
- `app/Models/Traits/BelongsToTenant.php` - Trait para isolamento multi-tenant

### Controladores:
- `app/Http/Controllers/Dashboard/DashboardController.php` - Controlador da dashboard do lojista
- `app/Http/Controllers/Dashboard/ProdutoController.php` - Gerenciamento de produtos
- `app/Http/Controllers/Dashboard/CategoriaController.php` - Gerenciamento de categorias
- `app/Http/Controllers/Admin/AdminController.php` - Controlador do painel admin
- `app/Http/Controllers/RegistroTenantController.php` - Registro de novos lojistas

### Middlewares:
- `app/Http/Middleware/TenantMiddleware.php` - Middleware de isolamento de lojista
- `app/Http/Middleware/AdminMiddleware.php` - Middleware para área administrativa

### Views principais:
- `resources/views/dashboard/index.blade.php` - Dashboard do lojista
- `resources/views/auth/registro-tenant.blade.php` - Formulário de registro de lojista
- `resources/views/layouts/master.blade.php` - Layout principal
- `resources/views/layouts/master-without_nav.blade.php` - Layout sem navegação

### Rotas:
- `routes/web.php` - Definição das rotas web

## Observações importantes

1. Certifique-se de que o PHP e o MySQL estejam instalados na nova máquina
2. Verifique se as extensões necessárias do PHP estão habilitadas
3. Ajuste as permissões de diretório conforme necessário
4. Se encontrar problemas, consulte o log do Laravel em `storage/logs/laravel.log`

## Credenciais padrão

### Administrador
- Email: admin@exemplo.com
- Senha: 123456

### Lojista de teste
- Email: lojista@exemplo.com
- Senha: 123456 