<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Construtor com middleware de autenticação e admin
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    /**
     * Exibe o dashboard do administrador
     */
    public function index()
    {
        $totalTenants = Tenant::count();
        $totalUsers = User::count();
        $activeTenants = Tenant::where('ativo', true)->count();
        
        // Aqui podemos adicionar mais estatísticas e informações relevantes para o admin
        
        return view('admin.index', compact('totalTenants', 'totalUsers', 'activeTenants'));
    }
}
