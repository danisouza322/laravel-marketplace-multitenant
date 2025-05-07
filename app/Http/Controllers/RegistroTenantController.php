<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistroTenantController extends Controller
{
    /**
     * Exibe o formulário de cadastro de tenant
     */
    public function create()
    {
        // Se o usuário já está autenticado, redireciona
        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        }
        
        return view('auth.registro-tenant');
    }
    
    /**
     * Processa o cadastro de um novo tenant
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'whatsapp' => 'required|string|max:20',
            'cidade' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'termos' => 'accepted',
        ], [
            'termos.accepted' => 'Você precisa aceitar os termos de uso.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
        ]);
        
        try {
            DB::beginTransaction();
            
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
            
            DB::commit();
            
            // Fazer login com o usuário recém-criado
            Auth::login($user);
            
            return redirect()->route('dashboard.index')
                ->with('success', 'Sua loja foi criada com sucesso! Bem-vindo ao seu painel.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Ocorreu um erro ao criar sua loja. Por favor, tente novamente.']);
        }
    }
}
