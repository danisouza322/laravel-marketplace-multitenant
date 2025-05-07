<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware(['auth', 'tenant']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::where('tenant_id', Auth::user()->tenant_id)
                    ->with('categoria')
                    ->orderBy('nome')
                    ->paginate(10);
                    
        return view('dashboard.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->where('ativo', true)
                     ->orderBy('nome')
                     ->pluck('nome', 'id');
                     
        return view('dashboard.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'preco_promocional' => 'nullable|numeric|min:0',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'categoria_id' => 'nullable|exists:categorias,id',
            'destaque' => 'boolean',
            'ativo' => 'boolean',
            'ordem' => 'nullable|integer'
        ]);
        
        $produto = new Produto();
        $produto->tenant_id = Auth::user()->tenant_id;
        $produto->nome = $request->nome;
        $produto->slug = Produto::gerarSlug($request->nome, Auth::user()->tenant_id);
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->preco_promocional = $request->preco_promocional;
        $produto->categoria_id = $request->categoria_id;
        $produto->destaque = $request->has('destaque') ? true : false;
        $produto->ativo = $request->has('ativo') ? true : false;
        $produto->ordem = $request->ordem ?? 0;
        
        // Upload de imagem
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagemPath = $imagem->store('produtos', 'public');
            $produto->imagem = $imagemPath;
        }
        
        $produto->save();
        
        return redirect()->route('produtos.index')
                ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->with('categoria')
                   ->findOrFail($id);
                   
        return view('dashboard.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->findOrFail($id);
                   
        $categorias = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->where('ativo', true)
                     ->orderBy('nome')
                     ->pluck('nome', 'id');
                     
        return view('dashboard.produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->findOrFail($id);
        
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'preco_promocional' => 'nullable|numeric|min:0',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'categoria_id' => 'nullable|exists:categorias,id',
            'destaque' => 'boolean',
            'ativo' => 'boolean',
            'ordem' => 'nullable|integer'
        ]);
        
        $produto->nome = $request->nome;
        
        // Só atualiza o slug se o nome mudou
        if ($produto->isDirty('nome')) {
            $produto->slug = Produto::gerarSlug($request->nome, Auth::user()->tenant_id);
        }
        
        $produto->descricao = $request->descricao;
        $produto->preco = $request->preco;
        $produto->preco_promocional = $request->preco_promocional;
        $produto->categoria_id = $request->categoria_id;
        $produto->destaque = $request->has('destaque') ? true : false;
        $produto->ativo = $request->has('ativo') ? true : false;
        $produto->ordem = $request->ordem ?? 0;
        
        // Upload de imagem
        if ($request->hasFile('imagem')) {
            // Remover imagem anterior
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            
            $imagem = $request->file('imagem');
            $imagemPath = $imagem->store('produtos', 'public');
            $produto->imagem = $imagemPath;
        }
        
        $produto->save();
        
        return redirect()->route('produtos.index')
                ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->findOrFail($id);
                   
        // Remover imagem
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        
        $produto->delete();
        
        return redirect()->route('produtos.index')
                ->with('success', 'Produto excluído com sucesso!');
    }
    
    /**
     * Toggle the featured status of the product.
     */
    public function toggleDestaque(string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->findOrFail($id);
                   
        $produto->destaque = !$produto->destaque;
        $produto->save();
        
        return redirect()->route('produtos.index')
                ->with('success', 'Status de destaque alterado com sucesso!');
    }
    
    /**
     * Toggle the active status of the product.
     */
    public function toggleAtivo(string $id)
    {
        $produto = Produto::where('tenant_id', Auth::user()->tenant_id)
                   ->findOrFail($id);
                   
        $produto->ativo = !$produto->ativo;
        $produto->save();
        
        return redirect()->route('produtos.index')
                ->with('success', 'Status alterado com sucesso!');
    }
}
