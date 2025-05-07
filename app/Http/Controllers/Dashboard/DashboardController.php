<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Categoria;

class DashboardController extends Controller
{
    /**
     * Construtor com middleware de autenticação e tenant
     */
    public function __construct()
    {
        $this->middleware(['auth', 'tenant']);
    }
    
    /**
     * Exibe o dashboard do tenant
     */
    public function index()
    {
        $tenant = Auth::user()->tenant;
        
        // Estatísticas para o dashboard
        $totalProdutos = Produto::where('tenant_id', $tenant->id)->count();
        $produtosAtivos = Produto::where('tenant_id', $tenant->id)->where('ativo', true)->count();
        $produtosDestaque = Produto::where('tenant_id', $tenant->id)->where('destaque', true)->count();
        $totalCategorias = Categoria::where('tenant_id', $tenant->id)->count();
        
        // Produtos recentes
        $produtosRecentes = Produto::where('tenant_id', $tenant->id)
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
        
        // Categorias populares (com mais produtos)
        $categoriasPorProdutos = Categoria::where('tenant_id', $tenant->id)
                                          ->withCount('produtos')
                                          ->orderBy('produtos_count', 'desc')
                                          ->take(5)
                                          ->get();
        
        return view('dashboard.index', compact(
            'tenant', 
            'totalProdutos', 
            'produtosAtivos', 
            'produtosDestaque', 
            'totalCategorias',
            'produtosRecentes',
            'categoriasPorProdutos'
        ));
    }
}
