@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="row">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filial:</h5>
                    <p class="card-text">{{ $branch->name }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Código:</h5>
                    <p class="card-text">{{ $branch->code }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row top-margin-row">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CNPJ:</h5>
                    <p class="card-text">{{ $branch->cnpj }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contribuição mínima Sindical:</h5>
                    <p class="card-text"> R$ {{ $branch->minContribution /100 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection