@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        
        <div class="card-header">
            Cadastrar informações bancárias:
            @if(session()->has('success'))
                <div class="alert alert-danger" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('bankinfo.store') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Nome: </label>
                        <select id="name" class="form-control" name="name">
                            <option  @if (old('name') == 'Caixa') selected="selected" @endif>Caixa</option>
                            <option  @if (old('name') == 'Banco Brasil') selected="selected" @endif>Banco Brasil</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class="col-form-label text-md-right">Código do Convênio fornecido pelo banco: </label>
                        <input 
                            id="agreementCode" type="text"
                            class="form-control{{ $errors->has('agreementCode') ? ' is-invalid' : '' }}"
                            name="agreementCode" value="{{ old('agreementCode') }}" required autocomplete="agreementCode"
                            autofocus>
                        @if ($errors->has('agreementCode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('agreementCode') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-4">
                        <label class="col-form-label text-md-right">Nome da empresa: </label>
                        <input 
                            id="branchName" type="text"
                            class="form-control{{ $errors->has('branchName') ? ' is-invalid' : '' }}"
                            name="branchName" maxlength="20" value="{{ old('branchName') }}" required autocomplete="branchName"
                            autofocus>
                        @if ($errors->has('branchName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('branchName') }}</strong>
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
</div
@endsection