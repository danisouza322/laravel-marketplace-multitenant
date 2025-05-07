<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
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
        $categorias = Categoria::where('tenant_id', Auth::user()->tenant_id)
                      ->orderBy('ordem')
                      ->orderBy('nome')
                      ->paginate(10);
                      
        return view('dashboard.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'ativo' => 'boolean',
            'ordem' => 'nullable|integer'
        ]);
        
        $categoria = new Categoria();
        $categoria->tenant_id = Auth::user()->tenant_id;
        $categoria->nome = $request->nome;
        $categoria->slug = Categoria::gerarSlug($request->nome, Auth::user()->tenant_id);
        $categoria->descricao = $request->descricao;
        $categoria->ativo = $request->has('ativo') ? true : false;
        $categoria->ordem = $request->ordem ?? 0;
        $categoria->save();
        
        return redirect()->route('categorias.index')
                ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->findOrFail($id);
                     
        return view('dashboard.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->findOrFail($id);
                     
        return view('dashboard.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->findOrFail($id);
        
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'ativo' => 'boolean',
            'ordem' => 'nullable|integer'
        ]);
        
        $categoria->nome = $request->nome;
        
        // Só atualiza o slug se o nome mudou
        if ($categoria->isDirty('nome')) {
            $categoria->slug = Categoria::gerarSlug($request->nome, Auth::user()->tenant_id);
        }
        
        $categoria->descricao = $request->descricao;
        $categoria->ativo = $request->has('ativo') ? true : false;
        $categoria->ordem = $request->ordem ?? 0;
        $categoria->save();
        
        return redirect()->route('categorias.index')
                ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::where('tenant_id', Auth::user()->tenant_id)
                     ->findOrFail($id);
                     
        // Verificar se há produtos associados
        if ($categoria->produtos()->count() > 0) {
            return redirect()->route('categorias.index')
                    ->with('error', 'Esta categoria não pode ser excluída pois possui produtos associados.');
        }
        
        $categoria->delete();
        
        return redirect()->route('categorias.index')
                ->with('success', 'Categoria excluída com sucesso!');
    }
}
