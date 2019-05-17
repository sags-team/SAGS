@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        
        <div class="card-header">
            Informações bancárias:
            @if(session()->has('success'))
                <div class="alert alert-danger" role="alert">
                    {{session('success')}}
                </div>
            @endif
        </div>

        <div class="card-body">
            @if(isset($bankInfos))
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($bankInfos as $infos)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->index == 0) active @endif" id="{{str_replace(' ', '', $infos->name)}}-tab"
                        data-toggle="tab" href="#{{str_replace(' ', '', $infos->name)}}-area" role="tab"
                        aria-controls="{{str_replace(' ', '', $infos->name)}}" aria-selected="@if($loop->index == 0) true @endif">
                            {{$infos->name}}
                        </a>
                    </li>
                @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                @foreach($bankInfos as $infos)
                    <div class="tab-pane fade @if($loop->index == 0) show active @endif" id="{{str_replace(' ', '', $infos->name)}}-area"
                        role="tabpanel" aria-labelledby="{{str_replace(' ', '', $infos->name)}}-tab">
                        <div class="row top-margin-row">
                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Nome:</h5>
                                        <p class="card-text">{{ $infos->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Código do convênio:</h5>
                                        <p class="card-text">{{ $infos->agreementCode }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">    
                                <div class="card border-dark">
                                    <div class="card-body ">
                                        <h5 class="card-title">Nome da Empresa: </h5>
                                        <p class="card-text">{{ $infos->branchName }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row top-margin-row">
                            <div class="col-sm-4 offset-md-2">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Código do Banco:</h5>
                                        <p class="card-text">{{ $infos->bankCode }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card border-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Número atual do arquivo:</h5>
                                        <p class="card-text">{{ $infos->fileCounter }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row top-margin-row">
                            <div class="col-sm-1 offset-md-5">
                                <a href="{{ route('bankinfo.edit', $infos->id)}}" class="btn btn-primary">Editar</a>
                            </div>
                            <div class="col-sm-1">        
                                <form action="{{route('bankinfo.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$infos->id}}" />
                                    <button class="btn btn-danger" type="submit" onclick="this.disabled=true;this.form.submit();">Deletar</button>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @endif
            <div class="row top-margin-row">
                <div class="col-sm-4 offset-md-4" style="padding-left:70px;">
                    <a href="{{ route('bankInfo.create')}}" class="btn btn-success">Adicionar Informações bancárias</a>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection