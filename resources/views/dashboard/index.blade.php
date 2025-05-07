@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Início
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Bem-vindo, {{ Auth::user()->name }}!</h4>
                    <p>Este é o seu painel de controle da loja virtual <strong>{{ $tenant->nome }}</strong>.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bx bx-box h2"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Produtos</h5>
                        <h4 class="fw-medium font-size-24">{{ $totalProdutos }}</h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('produtos.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">{{ $produtosAtivos }} ativos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-success text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bx bx-star h2"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Destaques</h5>
                        <h4 class="fw-medium font-size-24">{{ $produtosDestaque }}</h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('produtos.index', ['destaque' => '1']) }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Produtos em destaque</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bx bx-category h2"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Categorias</h5>
                        <h4 class="fw-medium font-size-24">{{ $totalCategorias }}</h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ route('categorias.index') }}" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Ver todas as categorias</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-warning text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bx bx-cog h2"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Configurações</h5>
                        <h4 class="fw-medium font-size-24">
                            <i class="bx bx-store-alt"></i>
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Configurar sua loja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Produtos Recentes</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produtosRecentes as $produto)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $produto->nome }}</h6>
                                        </td>
                                        <td>
                                            @if ($produto->em_promocao)
                                                <span class="text-decoration-line-through text-muted me-1">
                                                    {{ $produto->preco_formatado }}
                                                </span>
                                                <span class="text-success">
                                                    {{ $produto->preco_promocional_formatado }}
                                                </span>
                                            @else
                                                {{ $produto->preco_formatado }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($produto->ativo)
                                                <span class="badge badge-soft-success">Ativo</span>
                                            @else
                                                <span class="badge badge-soft-danger">Inativo</span>
                                            @endif
                                            
                                            @if ($produto->destaque)
                                                <span class="badge badge-soft-warning ms-1">Destaque</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Você ainda não possui produtos cadastrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <a href="{{ route('produtos.create') }}" class="btn btn-primary waves-effect waves-light btn-sm">Adicionar Novo Produto <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Categorias Populares</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Categoria</th>
                                    <th>Produtos</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categoriasPorProdutos as $categoria)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $categoria->nome }}</h6>
                                        </td>
                                        <td>{{ $categoria->produtos_count }}</td>
                                        <td>
                                            @if ($categoria->ativo)
                                                <span class="badge badge-soft-success">Ativa</span>
                                            @else
                                                <span class="badge badge-soft-danger">Inativa</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Você ainda não possui categorias cadastradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <a href="{{ route('categorias.create') }}" class="btn btn-primary waves-effect waves-light btn-sm">Adicionar Nova Categoria <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Links Úteis</h4>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-3">
                                <a href="{{ route('produtos.index') }}" class="d-flex gap-3 p-3 rounded border">
                                    <i class="bx bx-box font-size-22 text-primary"></i>
                                    <div>
                                        <h5 class="font-size-16 mb-1">Gerenciar Produtos</h5>
                                        <p class="text-muted mb-0">Adicione, edite ou remova produtos da sua loja</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('categorias.index') }}" class="d-flex gap-3 p-3 rounded border">
                                    <i class="bx bx-category font-size-22 text-primary"></i>
                                    <div>
                                        <h5 class="font-size-16 mb-1">Gerenciar Categorias</h5>
                                        <p class="text-muted mb-0">Organize seus produtos em categorias</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-3">
                                <a href="#" class="d-flex gap-3 p-3 rounded border">
                                    <i class="bx bx-store-alt font-size-22 text-primary"></i>
                                    <div>
                                        <h5 class="font-size-16 mb-1">Ver sua Loja</h5>
                                        <p class="text-muted mb-0">Veja como sua loja aparece para os clientes</p>
                                    </div>
                                </a>
                                
                                <a href="#" class="d-flex gap-3 p-3 rounded border">
                                    <i class="bx bx-cog font-size-22 text-primary"></i>
                                    <div>
                                        <h5 class="font-size-16 mb-1">Configurações da Loja</h5>
                                        <p class="text-muted mb-0">Personalize e configure sua loja virtual</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection 