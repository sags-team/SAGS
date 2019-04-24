@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Adicionando novo Filiado:
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('affiliated.store') }}">
                @csrf
                @include('admin.affiliate.form')
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Criar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection