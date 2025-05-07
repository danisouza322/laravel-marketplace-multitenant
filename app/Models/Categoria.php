<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\BelongsToTenant;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use HasFactory, BelongsToTenant;
    
    protected $fillable = [
        'tenant_id',
        'nome',
        'slug',
        'descricao',
        'ativo',
        'ordem'
    ];
    
    protected $casts = [
        'ativo' => 'boolean'
    ];
    
    /**
     * Retorna os produtos desta categoria
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
    
    /**
     * Gera um slug único baseado no nome
     */
    public static function gerarSlug($nome, $tenant_id)
    {
        $slug = Str::slug($nome);
        $count = static::where('tenant_id', $tenant_id)
                      ->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$'")
                      ->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
