<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\BelongsToTenant;
use Illuminate\Support\Str;

class Produto extends Model
{
    use HasFactory, BelongsToTenant;
    
    protected $fillable = [
        'tenant_id',
        'nome',
        'slug',
        'descricao',
        'preco',
        'preco_promocional',
        'imagem',
        'destaque',
        'ativo',
        'ordem',
        'categoria_id'
    ];
    
    protected $casts = [
        'preco' => 'decimal:2',
        'preco_promocional' => 'decimal:2',
        'destaque' => 'boolean',
        'ativo' => 'boolean'
    ];
    
    /**
     * Retorna a categoria do produto
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    
    /**
     * Retorna o preço formatado
     */
    public function getPrecoFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
    
    /**
     * Retorna o preço promocional formatado
     */
    public function getPrecoPromocionalFormatadoAttribute()
    {
        if (!$this->preco_promocional) {
            return null;
        }
        
        return 'R$ ' . number_format($this->preco_promocional, 2, ',', '.');
    }
    
    /**
     * Verifica se o produto está em promoção
     */
    public function getEmPromocaoAttribute()
    {
        return !is_null($this->preco_promocional) && $this->preco_promocional > 0;
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
    
    /**
     * Retorna o link de compartilhamento do produto
     */
    public function getLinkAttribute()
    {
        return url("/loja/{$this->tenant->slug}/produto/{$this->slug}");
    }
}
