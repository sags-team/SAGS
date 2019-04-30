@extends('layouts.layoutSuper')

@section('content')
    <div class="container initial-space">
        <div class="card uper">
            <div class="card-header">
                Exibindo informações do Usuário {{ $user->name}}:
            </div>
            <div class="card-body">
                <div class="row top-margin-row">
                    <div class="col-sm-4 offset-md-2">
                        <div class="card border-dark">
                            <div class="card-body">
                                <h5 class="card-title">Nome:</h5>
                                <p class="card-text">{{ $user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-dark">
                            <div class="card-body">
                                <h5 class="card-title">E-mail:</h5>
                                <p class="card-text">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row top-margin-row">
                    <div class="col-sm-4 offset-md-2">
                        <div class="card border-dark">
                            <div class="card-body">
                                <h5 class="card-title">Nível de permissão:</h5>
                                <p class="card-text">{{ $user->roles[0]->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-dark">
                            <div class="card-body">
                                <h5 class="card-title">Filial:</h5>
                                <p class="card-text">{{ $user->branch->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection