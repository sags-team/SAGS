@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Geração de Arquivos:
            @if(session()->has('success'))
                <div class="alert alert-danger" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('file.generate') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Gerar arquivo para qual banco ? </label>
                        <select id="name" class="form-control" name="name">
                            @foreach($bankInfos as $infos)
                                <option @if (old('name') == $infos->name) selected="selected" @endif>{{$infos->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label class=" col-form-label text-md-right">Tipo de arquivo ? </label>
                        <select id="type" class="form-control" name="type">
                            <option  @if (old('type') == 'Cadastrar Usuarios') selected="selected" @endif>Cadastrar Usuarios</option>
                            <option  @if (old('type') == 'Debito') selected="selected" @endif>Debito</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-5">
                        <button type="submit" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">
                            {{ __('Gerar arquivo') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection