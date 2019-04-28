@extends('layouts.layoutSuper')

@section('content')
    <div class="container initial-space">
        <div class="card">
            <div class="card-header">
                Bem-vindos ao SAGS
            </div>
            <div class="card-body">
                <h5 class="card-title"> Resumo sobre as funcionalidades de Super Administrador</h5>
                <div class="card border-dark">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Filiais</h6>
                        <h6 class="card-title" style="margin-left:10px;">Informações</h6>
                        <p class="card-text" style="margin-left:20px;">
                            Exibe informações cadastrais da filial no qual administrador está vinculado.
                        </p>
                    </div>
                </div>

                <div class="card border-dark" style="margin-top:5px;">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Filiados</h6>
                        <h6 class="card-title" style="margin-left:10px;">Novo filiado</h6>
                        <p class="card-text" style="margin-left:20px;">
                            Permite que o administrador cadastre um novo filiado que será automaticamente
                            vinculado a filial na qual pertence.
                        </p>
                        <h6 class="card-title" style="margin-left:10px;">Ver listagem</h6>
                        <p class="card-text" style="margin-left:20px;">
                            O administrador será capaz de visualizar todos os filiados cadastrados
                            que estão vinculados a sua filial. Para cada filiado, será possivel, visualizar
                            os dados cadastrais, assim como edita-los e também deletar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection