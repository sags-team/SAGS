@extends('layouts.layout')

@section('content')
<div class="container initial-space">
    <div class="card uper">
        <div class="card-header">
            Editando Filiado {{ $affiliated->name }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('affiliated.update', ['id'=>$affiliated->id]) }}">
                <input type='hidden' name='_method' value='put' />
                @csrf
                @include('admin.affiliated.form')
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection