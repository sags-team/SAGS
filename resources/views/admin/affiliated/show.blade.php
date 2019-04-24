@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="row">

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome:</h5>
                    <p class="card-text">{{ $affiliated->name }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">E-mail:</h5>
                    <p class="card-text">{{ $affiliated->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">    
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estado civil:</h5>
                    <p class="card-text">{{ $affiliated->maritalStat }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row top-margin-row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CPF:</h5>
                    <p class="card-text">{{ $affiliated->cpf }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">RG:</h5>
                    <p class="card-text">{{ $affiliated->rg }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">    
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SIAPE:</h5>
                    <p class="card-text">{{ $affiliated->siape }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row top-margin-row">
        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sexo:</h5>
                    <p class="card-text">{{ $affiliated->cpf }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grau:</h5>
                    <p class="card-text">{{ $affiliated->rg }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nivel Educacional:</h5>
                    <p class="card-text">{{ $affiliated->educationDegree }}</p>
                </div>
            </div>
        </div>

        
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Valor de contribuição:</h5>
                    <p class="card-text"> R$ {{ $affiliated->contribution/100 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row  top-margin-row justify-content-md-center">
        <div class="col-sm-2">
            <a href="{{ route('affiliates') }}" class="btn btn-success">Voltar</a>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('affiliated.editar', $affiliated->id)}}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection