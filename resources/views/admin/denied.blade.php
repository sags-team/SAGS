@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-body">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Houve um problema, acesso NEGADO!</h4>
                <p>
                    Você tentou acessar uma área proibida para o seu grau de permissão!
                    Se isso for um engano, por favor entre em contato com a equipe de suporte.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
