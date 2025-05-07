<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TenantController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('nome')->paginate(10);
        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'whatsapp' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);
        
        // Criar o tenant
        $tenant = new Tenant();
        $tenant->nome = $request->nome;
        $tenant->slug = Tenant::gerarSlug($request->nome);
        $tenant->whatsapp = $request->whatsapp;
        $tenant->cidade = $request->cidade;
        $tenant->descricao = $request->descricao;
        
        // Upload de logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('tenants/logos', 'public');
            $tenant->logo = $logoPath;
        }
        
        // Upload de banner
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerPath = $banner->store('tenants/banners', 'public');
            $tenant->banner = $bannerPath;
        }
        
        $tenant->save();
        
        // Criar usuário do tenant
        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->avatar = '';
        $user->tenant_id = $tenant->id;
        $user->save();
        
        return redirect()->route('tenants.index')
            ->with('success', 'Lojista criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('admin.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('admin.tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tenant = Tenant::findOrFail($id);
        
        $request->validate([
            'nome' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'ativo' => 'required|boolean',
        ]);
        
        $tenant->nome = $request->nome;
        $tenant->whatsapp = $request->whatsapp;
        $tenant->cidade = $request->cidade;
        $tenant->descricao = $request->descricao;
        $tenant->ativo = $request->ativo;
        
        // Upload de logo
        if ($request->hasFile('logo')) {
            // Remover logo anterior
            if ($tenant->logo) {
                Storage::disk('public')->delete($tenant->logo);
            }
            
            $logo = $request->file('logo');
            $logoPath = $logo->store('tenants/logos', 'public');
            $tenant->logo = $logoPath;
        }
        
        // Upload de banner
        if ($request->hasFile('banner')) {
            // Remover banner anterior
            if ($tenant->banner) {
                Storage::disk('public')->delete($tenant->banner);
            }
            
            $banner = $request->file('banner');
            $bannerPath = $banner->store('tenants/banners', 'public');
            $tenant->banner = $bannerPath;
        }
        
        $tenant->save();
        
        return redirect()->route('tenants.index')
            ->with('success', 'Lojista atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tenant = Tenant::findOrFail($id);
        
        // Remover logo e banner
        if ($tenant->logo) {
            Storage::disk('public')->delete($tenant->logo);
        }
        
        if ($tenant->banner) {
            Storage::disk('public')->delete($tenant->banner);
        }
        
        // Remover usuário do tenant
        if ($tenant->user) {
            $tenant->user->delete();
        }
        
        $tenant->delete();
        
        return redirect()->route('tenants.index')
            ->with('success', 'Lojista excluído com sucesso!');
    }
}
