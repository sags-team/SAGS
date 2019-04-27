@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
    <div class="card-header">
        Lista de Afiliados:
        @if(session()->has('success'))
            <div class="alert alert-danger" role="alert">
                {{session('success')}}
            </div>
        @endif
    </div>
    <div class="card-body">
        
            <form method="POST" action="{{ route('affiliates.search')}}">
                @csrf
                <div class="row" style="margin-bottom:5px;">
                    <div class="col-sm-2 offset-md-8">
                        <input 
                            id="search" type="text"
                            class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}"
                            name="search" value="{{ old('search') }}" placeholder="pesquisar" required autocomplete="search"
                            autofocus>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-default">
                            <img src="{{ asset('images/search.png')}}" class="rounded-circle" width="25" height="25" alt="">
                        </button>
                    </div>
                </div>
            </form>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">SIAPE</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Grau</th>
                    <th scope="col">Contribuição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($affiliates as $affiliated)
                <tr>
                    <td>{{$affiliated->name}}</td>
                    <td>{{$affiliated->siape}}</td>
                    <td>{{$affiliated->cpf}}</td>
                    <td>{{$affiliated->workDegree}}</td>
                    <td>R$ {{number_format($affiliated->contribution/100, 2)}}</td>
                    <td class="">
                        <div class="line">
                            <a href="{{ route('affiliated.edit', $affiliated->id)}}" class="btn btn-primary">Editar</a>
                        </div>
                        <div class="line">
                            <form action="{{route('affiliated.delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$affiliated->id}}" />
                                <button class="btn btn-danger" type="submit" onclick="this.disabled=true;this.form.submit();">Deletar</button>
                            </form>
                        </div>
                        <div class="line">
                            <a href="{{ route('affiliated.show', $affiliated->id)}}" class="btn btn-success">Visualizar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $affiliates->links() }}
    </div>
</div>
@endsection