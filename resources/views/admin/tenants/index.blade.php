@extends('layouts.master')

@section('title') Gerenciar Lojistas @endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Admin @endslot
        @slot('title') Gerenciar Lojistas @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Lista de Lojistas</h4>
                        <a href="{{ route('tenants.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus-circle-outline me-1"></i> Novo Lojista
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Cidade</th>
                                    <th>WhatsApp</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tenants as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($tenant->logo)
                                                    <img src="{{ Storage::url($tenant->logo) }}" class="rounded-circle me-2" width="40" height="40" alt="{{ $tenant->nome }}">
                                                @else
                                                    <div class="avatar-sm me-2">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            {{ substr($tenant->nome, 0, 1) }}
                                                        </span>
                                                    </div>
                                                @endif
                                                {{ $tenant->nome }}
                                            </div>
                                        </td>
                                        <td>{{ $tenant->cidade }}</td>
                                        <td>{{ $tenant->whatsapp }}</td>
                                        <td>
                                            @if ($tenant->ativo)
                                                <span class="badge bg-success">Ativo</span>
                                            @else
                                                <span class="badge bg-danger">Inativo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-sm btn-info">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este lojista?');">
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
                                        <td colspan="6" class="text-center py-4">
                                            Nenhum lojista cadastrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $tenants->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 