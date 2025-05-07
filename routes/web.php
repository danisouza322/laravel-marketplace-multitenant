<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Dashboard\CategoriaController;
use App\Http\Controllers\Dashboard\ProdutoController;
use App\Http\Controllers\RegistroTenantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// Registro de Tenant (Público)
Route::get('/criar-loja', [RegistroTenantController::class, 'create'])->name('registro.tenant');
Route::post('/criar-loja', [RegistroTenantController::class, 'store'])->name('registro.tenant.store');

//Update User Details
Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Dashboard do Tenant (Lojista)
Route::prefix('dashboard')->middleware(['auth', 'tenant'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Rotas para gerenciamento de categorias
    Route::resource('categorias', CategoriaController::class);
    
    // Rotas para gerenciamento de produtos
    Route::resource('produtos', ProdutoController::class);
    Route::put('produtos/{id}/toggle-destaque', [ProdutoController::class, 'toggleDestaque'])->name('produtos.toggle-destaque');
    Route::put('produtos/{id}/toggle-ativo', [ProdutoController::class, 'toggleAtivo'])->name('produtos.toggle-ativo');
});

// Dashboard do Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    
    // Rotas para gerenciamento de tenants (lojistas)
    Route::resource('tenants', TenantController::class);
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
