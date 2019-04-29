@extends('layouts.layoutSuper')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-body">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Já existe uma empresa com o mesmo CNPJ</h4>
                <p>
                    O mesmo CNPJ ja foi fornecido como uma das filiais cadastradas no sistema
                    SAGS. Por favor, verificar o código de CNPJ novamente
                </p>
            </div>
        </div>
    </div>
</div>
@endsection