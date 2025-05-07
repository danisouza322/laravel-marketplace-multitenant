@extends('layouts.master-without_nav')

@section('title')
    Crie sua loja
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('body')
    <body>
@endsection

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Bem-vindo ao MinhaVitrine!</h5>
                                        <p>Crie sua loja online em minutos.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div class="p-2">
                                <form class="needs-validation" action="{{ route('registro.tenant.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome da Loja <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe o nome da sua loja.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                        <div class="invalid-feedback">
                                            Por favor, informe um e-mail válido.
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Senha <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                                <div class="invalid-feedback">
                                                    Por favor, informe uma senha.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirmar Senha <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                <div class="invalid-feedback">
                                                    Por favor, confirme sua senha.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="whatsapp" class="form-label">WhatsApp <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" required>
                                                <div class="invalid-feedback">
                                                    Por favor, informe seu WhatsApp.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="cidade" class="form-label">Cidade <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required>
                                                <div class="invalid-feedback">
                                                    Por favor, informe sua cidade.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição da Loja</label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="logo" class="form-label">Logo da Loja</label>
                                                <input type="file" class="form-control" id="logo" name="logo">
                                                <div class="form-text">Tamanho máximo: 2MB</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="banner" class="form-label">Banner da Loja</label>
                                                <input type="file" class="form-control" id="banner" name="banner">
                                                <div class="form-text">Tamanho máximo: 4MB</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="termos" name="termos" required>
                                            <label class="form-check-label" for="termos">
                                                Concordo com os <a href="#" data-bs-toggle="modal" data-bs-target="#termosModal">termos de uso</a>
                                            </label>
                                            <div class="invalid-feedback">
                                                Você deve concordar com os termos para continuar.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Criar minha loja</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p>Já tem uma loja? <a href="{{ route('login') }}" class="fw-medium text-primary">Faça login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Termos de Uso -->
    <div class="modal fade" id="termosModal" tabindex="-1" aria-labelledby="termosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termosModalLabel">Termos de Uso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>1. Aceitação dos Termos</h5>
                    <p>Ao registrar-se na plataforma MinhaVitrine, você concorda com estes termos e condições.</p>
                    
                    <h5>2. Responsabilidades do Lojista</h5>
                    <p>O lojista é responsável pelo conteúdo postado em sua loja virtual, incluindo descrições de produtos, imagens e informações de preço.</p>
                    
                    <h5>3. Proibições</h5>
                    <p>É proibida a venda de produtos ilegais, falsificados ou que violem propriedade intelectual de terceiros.</p>
                    
                    <h5>4. Pagamentos e Taxas</h5>
                    <p>A plataforma poderá cobrar taxas de assinatura conforme o plano escolhido pelo lojista.</p>
                    
                    <h5>5. Cancelamento</h5>
                    <p>O lojista pode cancelar sua conta a qualquer momento, mas não serão realizados reembolsos de valores já pagos.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
@endsection 