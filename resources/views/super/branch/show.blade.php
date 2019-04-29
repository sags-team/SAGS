@extends('layouts.layoutSuper')

@section('content')
    <div class="container initial-space">
        <div class="card uper">
            <div class='card-header'>
                Informações da Filial: 
            </div>
            <div class="card-body">
                <!-- Inicio das ABAS de informação -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a 
                            class="nav-link active" id="branch-tab"
                            data-toggle="tab" href="#branch-area" role="tab"
                            aria-controls="branch" aria-selected="true">
                            Dados básicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link" id="address-tab"
                            data-toggle="tab" href="#address-area" role="tab"
                            aria-controls="address" aria-selected="false">
                            Endereço
                        </a>
                    </li>
                    <li class="nav-item">
                        <a 
                            class="nav-link" id="telephone-tab"
                            data-toggle="tab" href="#telephone-area" role="tab"
                            aria-controls="telephone" aria-selected="false">
                            Telefones
                        </a>
                    </li>
                </ul>
                <!-- Fim das ABAS de informação -->

                <!-- Conteúdo das ABAS de informação -->
                <div class="tab-content" id="myTabContent">
                    <div 
                        class="tab-pane fade show active" id="branch-area" 
                        role="tabpanel" aria-labelledby="branch-tab">
                        
                        <div class="row top-margin-row"> <!--Primeira linha de informações-->
                            <div class="col-sm-4 offset-md-2">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Nome:</h5>
                                        <p class="card-text">{{ $branch->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Código:</h5>
                                        <p class="card-text">{{ $branch->code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row top-margin-row"> <!--Segunda linha de informações-->
                            <div class="col-sm-4 offset-md-2">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">CNPJ:</h5>
                                        <p class="card-text">{{ $branch->cnpj }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Contribuição Mínima:</h5>
                                        <p class="card-text"> R$ {{ number_format($branch->minContribution/100, 2 )}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div 
                        class="tab-pane fade" id="address-area"
                        role="tabpanel" aria-labelledby="address-tab">
                        <!-- Informações de Endereço-->
                        <div class="row top-margin-row">
                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">País:</h5>
                                        <p class="card-text">{{ $branch->address->country }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Estado:</h5>
                                        <p class="card-text">{{ $branch->address->state }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">    
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">CEP:</h5>
                                        <p class="card-text">{{ $branch->address->cep }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row top-margin-row">
                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Cidade:</h5>
                                        <p class="card-text">{{ $branch->address->city }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Bairro:</h5>
                                        <p class="card-text">{{ $branch->address->neighborhood }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">    
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Rua:</h5>
                                        <p class="card-text">{{ $branch->address->street }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top-margin-row">
                            <div class="col-sm-4 offset-md-2">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Número:</h5>
                                        <p class="card-text">{{ $branch->address->number }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Complemento:</h5>
                                        <p class="card-text">{{ $branch->address->complement }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div 
                        class="tab-pane fade" id="telephone-area"
                        role="tabpanel" aria-labelledby="telephone-tab">
                        <!-- Area de informações de telefones -->
                        <div class="row top-margin-row">
                            <div class="col-sm-4 offset-md-3" style="margin-top:10px;">
                                <h5>Telefone 1</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 offset-md-3">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">DDD:</h5>
                                        <p class="card-text">
                                            @isset($branch->telephones[0]->ddd)
                                                {{$branch->telephones[0]->ddd}}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Número:</h5>
                                        <p class="card-text">
                                            @isset($branch->telephones[0]->number)
                                                {{$branch->telephones[0]->number}}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top-margin-row">
                            <div class="col-sm-4 offset-md-3" style="margin-top:10px;">
                                <h5>Telefone 2</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 offset-md-3">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">DDD:</h5>
                                        <p class="card-text">
                                            @isset($branch->telephones[1]->ddd)
                                                {{$branch->telephones[1]->ddd}}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Número:</h5>
                                        <p class="card-text">
                                            @isset($branch->telephones[1]->number)
                                                {{$branch->telephones[1]->number}}
                                            @endisset
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim do Conteúdo das ABAS de informação -->

            </div>
        </div>
    </div>
@endsection