@extends('layouts.layoutSuper')

@section('content')
    <div class="container initial-space">
        <div class="card uper">
            <div class="card-header">
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('branch.search')}}">
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
                            <th scope="col">Código</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Contribuição Mínima</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                            <tr>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->code }}</td>
                                <td>{{ $branch->cnpj }}</td>
                                <td>R$ {{ str_replace( '.',',',number_format($branch->minContribution/100, 2)) }}</td>
                                <td class="">
                                    <div class="line">
                                        <a href="{{ route('branch.edit', $branch->id)}}" class="btn btn-primary">Editar</a>
                                    </div>
                                    <div class="line">
                                        
                                        <form action="{{route('branch.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$branch->id}}" />
                                            <button class="btn btn-danger" type="submit" onclick="this.disabled=true;this.form.submit();">Deletar</button>
                                        </form>
                                    </div>
                                    <div class="line">
                                        <a href="{{ route('branch.show', $branch->id)}}" class="btn btn-success">Visualizar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $branches->links() }}
            </div>
        </div>
    </div>
@endsection