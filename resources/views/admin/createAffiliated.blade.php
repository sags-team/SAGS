@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Adicionando novo Filiado:
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('affiliated.store') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Nome: </label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Email: </label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Estado civil: </label>
                        <select id="inputState" class="form-control" name='maritalStat'>
                            <option selected>Solteiro</option>
                            <option>Casado</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">CPF: </label>
                        <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus> 
                        @if ($errors->has('cpf'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">RG: </label>
                        <input id="rg" type="text" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" value="{{ old('rg') }}" required autocomplete="rg" autofocus> 
                        @if ($errors->has('rg'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rg') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">SIAPE: </label>
                        <input id="siape" type="text" class="form-control{{ $errors->has('siape') ? ' is-invalid' : '' }}" name="siape" value="{{ old('siape') }}" required autocomplete="siape" autofocus> 
                        @if ($errors->has('siape'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('siape') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class=" col-form-label text-md-right">Sexo: </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="exampleRadios1" value="Homem" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Homem
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="exampleRadios2" value="Mulher">
                            <label class="form-check-label" for="exampleRadios2">
                                Mulher
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label class=" col-form-label text-md-right">Grau: </label>
                        <select id="inputDegree" class="form-control" name="workDegree">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Nivel Educacional: </label>
                        <select id="inputWorkDegree" class="form-control" name="educationDegree">
                            <option selected>Bacharelando</option>
                            <option>Mestrando</option>
                            <option>Doutorando</option>
                            <option>Pós-Graduado</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Contribuição Sindical: </label>
                        <input id="contribution" type="text" class="form-control{{ $errors->has('contribution') ? ' is-invalid' : '' }}" name="contribution" value="{{ old('contribution') }}" required autocomplete="siape" autofocus>
                        @if ($errors->has('contribution'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contribution') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Criar') }}
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