@extends('layouts.master')

@section('title') Dashboard do Administrador @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboard @endslot
        @slot('title') Dashboard do Administrador @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-store"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">Lojistas</div>
                        </div>
                    </div>
                    <h4 class="mt-4">{{ $totalTenants }} lojistas</h4>
                    <div class="row">
                        <div class="col-7">
                            <p class="mb-0">Ativos: {{ $activeTenants }}</p>
                        </div>
                        <div class="col-5">
                            <p class="mb-0">Inativos: {{ $totalTenants - $activeTenants }}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <a href="{{ route('tenants.index') }}" class="btn btn-primary w-100">Gerenciar Lojistas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-account-multiple"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">Usuários</div>
                        </div>
                    </div>
                    <h4 class="mt-4">{{ $totalUsers }} usuários</h4>
                    <div class="row mt-4">
                        <div class="col-12">
                            <a href="#" class="btn btn-primary w-100">Gerenciar Usuários</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar-sm font-size-20 me-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-credit-card-outline"></i>
                            </span>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2">Assinaturas</div>
                        </div>
                    </div>
                    <h4 class="mt-4">0 assinaturas ativas</h4>
                    <div class="row mt-4">
                        <div class="col-12">
                            <a href="#" class="btn btn-primary w-100">Gerenciar Assinaturas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Links Rápidos</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar-md mx-auto mb-3">
                                        <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="mdi mdi-store-outline font-size-24"></i>
                                        </div>
                                    </div>
                                    <h5 class="font-size-15 mt-3">Lojistas</h5>
                                    <div class="mt-3">
                                        <a href="{{ route('tenants.index') }}" class="btn btn-primary btn-sm">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar-md mx-auto mb-3">
                                        <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="mdi mdi-tag-multiple-outline font-size-24"></i>
                                        </div>
                                    </div>
                                    <h5 class="font-size-15 mt-3">Produtos</h5>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-primary btn-sm">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar-md mx-auto mb-3">
                                        <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="mdi mdi-credit-card-outline font-size-24"></i>
                                        </div>
                                    </div>
                                    <h5 class="font-size-15 mt-3">Assinaturas</h5>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-primary btn-sm">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <div class="avatar-md mx-auto mb-3">
                                        <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="mdi mdi-chart-line font-size-24"></i>
                                        </div>
                                    </div>
                                    <h5 class="font-size-15 mt-3">Relatórios</h5>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-primary btn-sm">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 