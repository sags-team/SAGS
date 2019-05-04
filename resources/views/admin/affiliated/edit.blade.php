@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Editando Filiado {{ $affiliated->name }}:
            @if($errors->any())
                <li style="color:red;">Há erros no formulário</li>
            @endif 
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
            </ul>
            <form method="POST" action=" {{ route('affiliated.update') }}">
                @csrf
                <input type="hidden" id="affiliated-id" name="affiliated_id" value= {{ $affiliated->id }}>
                <div class="tab-content" id="myTabContent">
                    <!-- PRIMEIRA DIV DO FORMULARIO ---- REFERENTE A INFORMAÇÕES BÁSICAS -->
                    <div 
                        class="tab-pane fade show active" id="affiliated-area" 
                        role="tabpanel" aria-labelledby="affiliated-tab">
                        <div class="form-group row">
                            <!--Campo de nome do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Nome: </label>
                                <input 
                                    id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ $affiliated->name }}" required autocomplete="name"
                                    autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Campo de email do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Email: </label>
                                <input 
                                    id="email" type="email"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ $affiliated->email }}" required autocomplete="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--Campo de Estado civil do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Estado civil: </label>
                                <select id="inputState" class="form-control"
                                    name='maritalStat'>
                                    <option @if ($affiliated->maritalStat == 'Casado') selected="" @endif value="Solteiro">Solteiro</option>
                                    <option @if ($affiliated->maritalStat == 'Casado') selected="selected" @endif value="Casado">Casado</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <!-- Campo de CPF do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">CPF: </label>
                                <input
                                    id="cpf" type="text"
                                    class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}"
                                    name="cpf" value="{{ $affiliated->cpf }}" required autocomplete="cpf"> 
                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Campo de RG do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">RG: </label>
                                <input
                                    id="rg" type="text"
                                    class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}"
                                    name="rg" value="{{ $affiliated->rg }}" required autocomplete="rg"> 
                                @if ($errors->has('rg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Campo de RG do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">SIAPE: </label>
                                <input
                                    id="siape" type="text"
                                    class="form-control{{ $errors->has('siape') ? ' is-invalid' : '' }}"
                                    name="siape" value="{{ $affiliated->siape }}" required autocomplete="siape"> 
                                @if ($errors->has('siape'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siape') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Campo de Sexo do filiado-->
                            <div class="col-sm-2">
                                <label class=" col-form-label text-md-right">Sexo: </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex"
                                    id="exampleRadios1" value="Homem"
                                    {{ ($affiliated->sex == 'Homem') ? 'checked' : '' }} checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Homem
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex"
                                    id="exampleRadios2" value="Mulher"
                                    {{ ($affiliated->sex == 'Mulher') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Mulher
                                    </label>
                                </div>
                            </div>
                            <!-- Campo de Grau do filiado-->
                            <div class="col-sm-2">
                                <label class=" col-form-label text-md-right">Grau: </label>
                                <select id="inputDegree" class="form-control" name="workDegree">
                                    <option  @if ($affiliated->workDegree == '1') selected="selected" @endif>1</option>
                                    <option  @if ($affiliated->workDegree == '2') selected="selected" @endif>2</option>
                                    <option  @if ($affiliated->workDegree == '3') selected="selected" @endif>3</option>
                                    <option  @if ($affiliated->workDegree == '4') selected="selected" @endif>4</option>
                                </select>
                            </div>
                            <!-- Campo de Nivel Educacional do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Nivel Educacional: </label>
                                <select id="inputWorkDegree" class="form-control" name="educationDegree">
                                    <option @if ($affiliated->educationDegree == 'Bacharelando') selected="selected" @endif>Bacharelando</option>
                                    <option @if ($affiliated->educationDegree == 'Mestrando') selected="selected" @endif>Mestrando</option>
                                    <option @if ($affiliated->educationDegree == 'Doutorando') selected="selected" @endif>Doutorando</option>
                                    <option @if ($affiliated->educationDegree == 'Pós-Graduado') selected="selected" @endif>Pós-Graduado</option>
                                </select>
                            </div>
                            <!-- Campo de contribuição sindical do filiado-->
                            <div class="col-sm-4">
                                <label class=" col-form-label text-md-right">Contribuição Sindical: </label>
                                <input id="contribution" type="text"
                                class="form-control{{ $errors->has('contribution') ? ' is-invalid' : '' }}"
                                name="contribution" value="{{ str_replace( '.',',',number_format($affiliated->contribution/100, 2)) }}" required autocomplete="siape" autofocus>
                                @if ($errors->has('contribution'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contribution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- SEGUNDA DIV DO FORMULARIO ---- REFERENTE A ENDEREÇOS -->
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
                                    name="country" value="{{ $affiliated->address->country }}" required autocomplete="country"> 
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
                                    name="cep" value="{{ $affiliated->address->cep }}" required autocomplete="cep"> 
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
                                    name="state" value="{{ $affiliated->address->state }}" required autocomplete="state"> 
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
                                    name="city" value="{{ $affiliated->address->city }}" required autocomplete="country"> 
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
                                    name="neighborhood" value="{{ $affiliated->address->neighborhood }}" required autocomplete="neighborhood"> 
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
                                    name="number" value="{{ $affiliated->address->number }}" required autocomplete="neighborhood"> 
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
                                    name="street" value="{{ $affiliated->address->street }}" required autocomplete="street"> 
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
                                    name="complement" value="{{ $affiliated->address->complement }}" required autocomplete="complement"> 
                                @if ($errors->has('complement'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('complement') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- TERCEIRA DIV DO FORMULARIO ---- REFERENTE A TELEFONES -->
                    <div 
                        class="tab-pane fade" id="telephone-area"
                        role="tabpanel" aria-labelledby="telephone-tab">
                        <div class="row">
                            <div class="col-sm-4 offset-md-1" style="margin-top:10px;">
                                <h5>Telefone 1</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 offset-md-1">
                                <label class=" col-form-label text-md-right">DDI: </label>
                                <select id="ddi1" class="form-control" name="ddi1">
                                    @foreach($ddiCodes as $ddi)
                                    <option  @if ($affiliated->telephones[0]->ddi == $ddi["callingCode"]) selected="selected" @endif
                                            value={{$ddi["callingCode"]}}>{{$ddi["callingCode"]}} {{$ddi["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class=" col-form-label text-md-right">DDD: </label>
                                <input
                                    id="ddd1" type="text"
                                    class="form-control{{ $errors->has('ddd1') ? ' is-invalid' : '' }}"
                                    name="ddd1" value=@if(isset($affiliated->telephones[0]->ddd))
                                            "{{$affiliated->telephones[0]->ddd}}" @else ""
                                        @endif required autocomplete="ddd1"> 
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
                                    name="telephone1" value=@if(isset($affiliated->telephones[0]->number))
                                            "{{$affiliated->telephones[0]->number}}" @else ""
                                        @endif required autocomplete="telephone1"> 
                                @if ($errors->has('telephone1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 offset-md-1" style="margin-top:10px;">
                                <h5>Telefone 2</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 offset-md-1">
                                <label class=" col-form-label text-md-right">DDI: </label>
                                <select id="ddi2" class="form-control" name="ddi2">
                                    @foreach($ddiCodes as $ddi)
                                    <option  @if ( isset($affiliated->telephones[1]->ddi) && $affiliated->telephones[1]->ddi == $ddi["callingCode"]) selected="selected" @endif
                                            value={{$ddi["callingCode"]}}>{{$ddi["callingCode"]}} {{$ddi["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <label class=" col-form-label text-md-right">DDD: </label>
                                <input
                                    id="ddd2" type="text"
                                    class="form-control{{ $errors->has('ddd2') ? ' is-invalid' : '' }}"
                                    name="ddd2" value=@if(isset($affiliated->telephones[1]->ddd))
                                            "{{$affiliated->telephones[1]->ddd}}" @else ""
                                        @endif required autocomplete="ddd2"> 
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
                                    name="telephone2" value=@if(isset($affiliated->telephones[1]->number))
                                            "{{$affiliated->telephones[1]->number}}" @else ""
                                        @endif required autocomplete="telephone2"> 
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
        $("#contribution").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true});
    });
</script>
@endsection