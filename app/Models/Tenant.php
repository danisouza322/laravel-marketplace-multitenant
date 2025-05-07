<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'slug',
        'whatsapp',
        'logo',
        'banner',
        'cidade',
        'descricao',
        'ativo'
    ];
    
    /**
     * Retorna o usuário associado ao tenant
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
    
    /**
     * Retorna os produtos do tenant
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
    
    /**
     * Gera um slug único baseado no nome
     */
    public static function gerarSlug($nome)
    {
        $slug = Str::slug($nome);
        $count = static::whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$'")->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }
    
    /**
     * Retorna o link da loja
     */
    public function getLinkAttribute()
    {
        return url("/loja/{$this->slug}");
    }
}
