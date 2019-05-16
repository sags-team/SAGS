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

        </div>
        
    </div>
</div>
@endsection