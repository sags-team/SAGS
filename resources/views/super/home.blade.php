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
                        <h6 class="card-title" style="margin-left:10px;">Novo Cadastro</h6>
                        <p class="card-text" style="margin-left:20px;">
                            Permite ao administrador cadastrar uma nova filial para inserção no sistema
                        </p>
                        <h6 class="card-title" style="margin-left:10px;">Ver listagem</h6>
                        <p class="card-text" style="margin-left:20px;">
                            Permite ao administrador observar todas as filiais cadastradas, além de alterar,
                            deletar e visualizar.
                        </p>
                    </div>
                </div>

                <div class="card border-dark" style="margin-top:5px;">
                    <div class="card-body text-dark">
                        <h5 class="card-title">Administradores</h6>
                        <h6 class="card-title" style="margin-left:10px;">Novo administrador</h6>
                        <p class="card-text" style="margin-left:20px;">
                            Permite que o super administrador cadastre um administrador sindical para uma
                            determinada filial.
                        </p>
                        <h6 class="card-title" style="margin-left:10px;">Ver listagem</h6>
                        <p class="card-text" style="margin-left:20px;">
                            O administrador será capaz de visualizar todos os usuários cadastrados.
                            Para cada usuário, será possivel, visualizar
                            os dados cadastrais, assim como edita-los e também deletar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection