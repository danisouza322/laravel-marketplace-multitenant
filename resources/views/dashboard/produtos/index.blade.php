@extends('layouts.master')

@section('title') Gerenciar Produtos @endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Dashboard @endslot
        @slot('title') Gerenciar Produtos @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Lista de Produtos</h4>
                        <a href="{{ route('produtos.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus-circle-outline me-1"></i> Novo Produto
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Categoria</th>
                                    <th>Status</th>
                                    <th>Destaque</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>
                                            @if ($produto->imagem)
                                                <img src="{{ Storage::url($produto->imagem) }}" class="rounded" width="50" height="50" alt="{{ $produto->nome }}">
                                            @else
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded bg-soft-primary text-primary">
                                                        <i class="mdi mdi-image-outline"></i>
                                                    </span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $produto->nome }}</td>
                                        <td>
                                            <div>{{ $produto->preco_formatado }}</div>
                                            @if ($produto->em_promocao)
                                                <div class="text-success">{{ $produto->preco_promocional_formatado }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $produto->categoria ? $produto->categoria->nome : 'Sem categoria' }}</td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm">
                                                <form action="{{ route('produtos.toggle-ativo', $produto->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-link p-0">
                                                        @if ($produto->ativo)
                                                            <span class="badge bg-success">Ativo</span>
                                                        @else
                                                            <span class="badge bg-danger">Inativo</span>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm">
                                                <form action="{{ route('produtos.toggle-destaque', $produto->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-link p-0">
                                                        @if ($produto->destaque)
                                                            <span class="badge bg-warning">Destaque</span>
                                                        @else
                                                            <span class="badge bg-light text-dark">Normal</span>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            Nenhum produto cadastrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $produtos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection 