@extends('layouts.layoutSuper')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-body">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Houve um problema, Filial Inexistente.</h4>
                <p>
                    O índice fornecido não pertence a nenhuma filial existente,
                    por favor, certifique de que o valor inserido esta correto.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
