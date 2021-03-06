@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Informações do Afiliado: 
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a 
                        class="nav-link active" id="affiliated-tab"
                        data-toggle="tab" href="#affiliated-area" role="tab"
                        aria-controls="affiliated" aria-selected="true">
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
                @if($affiliated->bankAccount != null)
                <li class="nav-item">
                    <a 
                        class="nav-link" id="bank-tab"
                        data-toggle="tab" href="#bank-area" role="tab"
                        aria-controls="bank" aria-selected="false">
                        Informações bancárias
                    </a>
                </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- PRIMEIRA DIV ---- REFERENTE A INFORMAÇÕES BÁSICAS -->
                <div 
                    class="tab-pane fade show active" id="affiliated-area" 
                    role="tabpanel" aria-labelledby="affiliated-tab">
                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Nome:</h5>
                                    <p class="card-text">{{ $affiliated->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">E-mail:</h5>
                                    <p class="card-text">{{ $affiliated->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Estado civil:</h5>
                                    <p class="card-text">{{ $affiliated->maritalStat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">CPF:</h5>
                                    <p class="card-text">{{ $affiliated->cpf }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">RG:</h5>
                                    <p class="card-text">{{ $affiliated->rg }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">SIAPE:</h5>
                                    <p class="card-text">{{ $affiliated->siape }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row top-margin-row">
                        <div class="col-sm-2">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Sexo:</h5>
                                    <p class="card-text">{{ $affiliated->sex }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Grau:</h5>
                                    <p class="card-text">{{ $affiliated->workDegree }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 ">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Nivel Educacional:</h5>
                                    <p class="card-text">{{ $affiliated->educationDegree }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Valor de contribuição:</h5>
                                    <p class="card-text"> R$ {{ number_format($affiliated->contribution/100, 2 )}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEGUNDA DIV ---- REFERENTE A ENDEREÇOS -->
                <div 
                    class="tab-pane fade" id="address-area"
                    role="tabpanel" aria-labelledby="address-tab">
                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">País:</h5>
                                    <p class="card-text">{{ $affiliated->address->country }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Estado:</h5>
                                    <p class="card-text">{{ $affiliated->address->state }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">CEP:</h5>
                                    <p class="card-text">{{ $affiliated->address->cep }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Cidade:</h5>
                                    <p class="card-text">{{ $affiliated->address->city }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Bairro:</h5>
                                    <p class="card-text">{{ $affiliated->address->neighborhood }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Rua:</h5>
                                    <p class="card-text">{{ $affiliated->address->street }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row top-margin-row">
                        <div class="col-sm-4 offset-md-2">
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Número:</h5>
                                    <p class="card-text">{{ $affiliated->address->number }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Complemento:</h5>
                                    <p class="card-text">{{ $affiliated->address->complement }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TERCEIRA DIV ---- REFERENTE A TELEFONES -->
                <div 
                    class="tab-pane fade" id="telephone-area"
                    role="tabpanel" aria-labelledby="telephone-tab">
                    <div class="row top-margin-row">
                        <div class="col-sm-4 offset-md-3" style="margin-top:10px;">
                            <h5>Telefone 1</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 offset-md-3">
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">DDI:</h5>
                                    <p class="card-text">
                                        @isset($affiliated->telephones[0]->ddi)
                                            {{$affiliated->telephones[0]->ddi}}
                                        @endisset
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">DDD:</h5>
                                    <p class="card-text">
                                        @isset($affiliated->telephones[0]->ddd)
                                            {{$affiliated->telephones[0]->ddd}}
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
                                        @isset($affiliated->telephones[0]->number)
                                            {{$affiliated->telephones[0]->number}}
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
                                    <h5 class="card-title">DDI:</h5>
                                    <p class="card-text">
                                        @isset($affiliated->telephones[0]->ddi)
                                            {{$affiliated->telephones[0]->ddi}}
                                        @endisset
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">DDD:</h5>
                                    <p class="card-text">
                                        @isset($affiliated->telephones[1]->ddd)
                                            {{$affiliated->telephones[1]->ddd}}
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
                                        @isset($affiliated->telephones[1]->number)
                                            {{$affiliated->telephones[1]->number}}
                                        @endisset
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  QUARTA DIV REFERENTE A INFORMAÇÕES BANCÁRIAS -->
                @if($affiliated->bankAccount != null)
                <div 
                    class="tab-pane fade" id="bank-area"
                    role="tabpanel" aria-labelledby="bank-tab">
                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Nome do Banco:</h5>
                                    <p class="card-text">{{ $affiliated->bankAccount->displayName }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Agência:</h5>
                                    <p class="card-text">{{ $affiliated->bankAccount->agency }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Número:</h5>
                                    <p class="card-text">{{ $affiliated->bankAccount->accountNumber }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row top-margin-row">
                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Código de operação:</h5>
                                    <p class="card-text">{{ $affiliated->bankAccount->operationCode }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Digito de verificação:</h5>
                                    <p class="card-text">{{ $affiliated->bankAccount->vdNumber }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                            <div class="card border-dark">
                                <div class="card-body ">
                                    <h5 class="card-title">Débito Ativado pelo banco:</h5>
                                    <p class="card-text">
                                        @if($affiliated->bankAccount->active == true)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($affiliated->bankAccount->active == false)
                    <div class="row top-margin-row">
                        <div class="col-sm-3 offset-md-4">
                            <a href="{{ route('bankaccount.edit', $affiliated->bankAccount->id)}}" class="btn btn-primary" style="margin-left:30px;">Alterar informações bancárias</a>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
            @if($affiliated->bankAccount == null)
            <div class="row top-margin-row">
                <div class="col-sm-3 offset-md-4">
                    <a href="{{ route('bankaccount.create', $affiliated->id)}}" class="btn btn-success" style="margin-left:30px;">Adicionar informações bancárias</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection