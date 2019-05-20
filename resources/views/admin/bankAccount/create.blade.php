@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        
        <div class="card-header">
            Adicionando informações bancarias:
            @if($errors->any())
                <li style="color:red;">Há erros no formulário</li>
            @endif 
        </div>

        <div class="card-body">
            
            <form method="POST" action="{{ route('bankaccount.store')}}">
                @csrf
                <input type="hidden" id="affiliated-id" name="affiliated_id" value= {{ $id }}>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Nome: </label>
                        <select id="displayName" class="form-control" name="displayName">
                            <option  @if (old('displayName') == 'Caixa Economica Federal') selected="selected" @endif>Caixa Economica Federal</option>
                            <option  @if (old('displayName') == 'Banco do Brasil') selected="selected" @endif>Banco do Brasil</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class="col-form-label text-md-right">Agência: </label>
                        <input 
                            id="agency" type="text"
                            class="form-control{{ $errors->has('agency') ? ' is-invalid' : '' }}"
                            name="agency" value="{{ old('agency') }}" required autocomplete="agency"
                            autofocus>
                        @if ($errors->has('agency'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('agency') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                        <label class="col-form-label text-md-right">Código de operação: </label>
                        <input 
                            id="operationCode" type="text"
                            class="form-control{{ $errors->has('operationCode') ? ' is-invalid' : '' }}"
                            name="operationCode" value="{{ old('operationCode') }}" required autocomplete="operationCode"
                            autofocus>
                        @if ($errors->has('operationCode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('operationCode') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-sm-4 offset-md-2">
                        <label class="col-form-label text-md-right">Número da conta: </label>
                        <input 
                            id="accountNumber" type="text"
                            class="form-control{{ $errors->has('accountNumber') ? ' is-invalid' : '' }}"
                            name="accountNumber" value="{{ old('accountNumber') }}" required autocomplete="accountNumber"
                            autofocus>
                        @if ($errors->has('accountNumber'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('accountNumber') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                        <label class="col-form-label text-md-right">Digito de verificação: </label>
                        <input 
                            id="vdNumber" type="text"
                            class="form-control{{ $errors->has('vdNumber') ? ' is-invalid' : '' }}"
                            name="vdNumber" value="{{ old('vdNumber') }}" required autocomplete="vdNumber"
                            autofocus>
                        @if ($errors->has('vdNumber'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('vdNumber') }}</strong>
                            </span>
                        @endif
                    </div>


                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-5">
                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">
                            {{ __('Criar') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection