@extends('layouts.layoutSuper')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class='card-header'>
            Editando Filial {{$branch->name}}:
        </div>
        <div class='card-body'>
            <!-- Definição das TABS de informações para editar -->
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
            <!-- Fim das TABS de informação -->
            <form method="POST" action=" {{route('branch.update')}}">
                @csrf
                <input type="hidden" id="branch-id" name="branch_id" value= {{ $branch->id }}>
                <div class="tab-content" id="myTabContent">
                    <div 
                        class="tab-pane fade show active" id="branch-area" 
                        role="tabpanel" aria-labelledby="branch-tab">
                        <div class="form-group row">
                            <div class="col-sm-4 offset-md-2">
                                <label class=" col-form-label text-md-right">Nome: </label>
                                <input 
                                    id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ $branch->name }}" required autocomplete="name"
                                    autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Campo de código da filial-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Código: </label>
                                <input 
                                    id="code" type="text"
                                    class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}"
                                    name="code" value="{{ $branch->code }}" required autocomplete="code">
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <!--Campo de cnpj da filial-->
                            <div class="col-sm-4 offset-md-2">
                                <label class=" col-form-label text-md-right">CNPJ: </label>
                                <input 
                                    id="cnpj" type="text"
                                    class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}"
                                    name="cnpj" value="{{ $branch->cnpj }}" required autocomplete="cnpj"
                                    autofocus>
                                @if ($errors->has('cnpj'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Campo de contribuição mínima da filial-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Contribuição Mínima: </label>
                                <input 
                                    id="minContribution" type="text"
                                    class="form-control {{ $errors->has('minContribution') ? ' is-invalid' : '' }}"
                                    name="minContribution" value="{{ str_replace( '.',',',number_format($branch->minContribution/100, 2)) }}" required autocomplete="minContribution">
                                @if ($errors->has('minContribution'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('minContribution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div 
                        class="tab-pane fade" id="address-area"
                        role="tabpanel" aria-labelledby="address-tab">
                        <div class="form-group row">
                            <!-- Campo de País-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">País: </label>
                                <input
                                    id="country" type="text"
                                    class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                    name="country" value="{{ $branch->address->country }}" required autocomplete="country"> 
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Campo de CEP-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">CEP: </label>
                                <input
                                    id="cep" type="text"
                                    class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}"
                                    name="cep" value="{{ $branch->address->cep }}" required autocomplete="cep"> 
                                @if ($errors->has('cep'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Campo de Estado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Estado: </label>
                                <input
                                    id="state" type="text"
                                    class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                    name="state" value="{{ $branch->address->state }}" required autocomplete="state"> 
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Campo de Cidade-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Cidade: </label>
                                <input
                                    id="city" type="text"
                                    class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                    name="city" value="{{ $branch->address->city }}" required autocomplete="city"> 
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Campo de Bairro-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Bairro: </label>
                                <input
                                    id="neighborhood" type="text"
                                    class="form-control{{ $errors->has('neighborhood') ? ' is-invalid' : '' }}"
                                    name="neighborhood" value="{{ $branch->address->neighborhood }}" required autocomplete="neighborhood"> 
                                @if ($errors->has('neighborhood'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('neighborhood') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Campo de Numero-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Número: </label>
                                <input
                                    id="number" type="number"
                                    class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                                    name="number" value="{{ $branch->address->number }}" required autocomplete="neighborhood"> 
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Campo de Bairro-->
                            <div class="col-sm-4 offset-md-2">
                                <label class=" col-form-label text-md-right">Rua: </label>
                                <input
                                    id="street" type="text"
                                    class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                    name="street" value="{{ $branch->address->street }}" required autocomplete="street"> 
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Campo de Complemento-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Complemento: </label>
                                <input
                                    id="complement" type="text"
                                    class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}"
                                    name="complement" value="{{ $branch->address->complement }}" required autocomplete="complement"> 
                                @if ($errors->has('complement'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('complement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div 
                        class="tab-pane fade" id="telephone-area"
                        role="tabpanel" aria-labelledby="telephone-tab">
                        <div class="row">
                            <div class="col-sm-4 offset-md-3" style="margin-top:10px;">
                                <h5>Telefone 1</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-1 offset-md-3">
                                <label class=" col-form-label text-md-right">DDD: </label>
                                <input
                                    id="ddd1" type="text"
                                    class="form-control{{ $errors->has('ddd1') ? ' is-invalid' : '' }}"
                                    name="ddd1" value=@if(isset($branch->telephones[0]->ddd))
                                                            "{{$branch->telephones[0]->ddd}}"
                                                        @else 
                                                            ""
                                                        @endif 
                                        required autocomplete="ddd1"> 
                                @if ($errors->has('ddd1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ddd1') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Telefone: </label>
                                <input
                                    id="telephone1" type="text"
                                    class="form-control{{ $errors->has('telephone1') ? ' is-invalid' : '' }}"
                                    name="telephone1" value=@if(isset($branch->telephones[0]->number))
                                                                "{{$branch->telephones[0]->number}}"
                                                            @else 
                                                                ""
                                                            @endif
                                        required autocomplete="telephone1"> 
                                @if ($errors->has('telephone1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-md-3" style="margin-top:10px;">
                                <h5>Telefone 2</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-1 offset-md-3">
                                <label class=" col-form-label text-md-right">DDD: </label>
                                <input
                                    id="ddd2" type="text"
                                    class="form-control{{ $errors->has('ddd2') ? ' is-invalid' : '' }}"
                                    name="ddd2" value=@if(isset($branch->telephones[1]->ddd))
                                                            "{{$branch->telephones[1]->ddd}}"
                                                        @else 
                                                            ""
                                                        @endif 
                                        required autocomplete="ddd2"> 
                                @if ($errors->has('ddd2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ddd2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Telefone: </label>
                                <input
                                    id="telephone2" type="text"
                                    class="form-control{{ $errors->has('telephone2') ? ' is-invalid' : '' }}"
                                    name="telephone2" value=@if(isset($branch->telephones[0]->number))
                                                                "{{$branch->telephones[0]->number}}"
                                                            @else 
                                                                ""
                                                            @endif
                                        required autocomplete="telephone2"> 
                                @if ($errors->has('telephone2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-5">
                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">
                            {{ __('Editar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/plugins/jquery-maskmoney/dist/jquery.maskMoney.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        console.log('carregou!!!')
        $("#minContribution").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true});
    });
</script>
@endsection