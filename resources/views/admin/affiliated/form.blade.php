<?php

    $selectedCasado = "";
    $selectedSolteiro = "selected";

    if ($affiliated->maritalStat) {
        if ( $affiliated->maritalStat == "Casado" ) {
            $selectedCasado = "selected";
            $selectedSolteiro = "";    
        }
    } else {
        if ( old('maritalStat') == "Casado" ) {
            $selectedCasado = "selected";
            $selectedSolteiro = "";    
        }
    }
    
?>
<div class="form-group row">
    <div class="col-sm-4">
        <label class=" col-form-label text-md-right">Nome: </label>
        <input 
            id="name"
            type="text"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name"
            value="{{ ($affiliated->name) ? $affiliated->name : old('name') }}" required autocomplete="name" autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>
    <div class="col-sm-4">
        <label class=" col-form-label text-md-right">Email: </label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
        name="email" value="{{ ($affiliated->email) ? $affiliated->email : old('email') }}" required autocomplete="email">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-sm-4">
        <label class=" col-form-label text-md-right">Estado civil: </label>
        <select id="inputState" class="form-control" name='maritalStat'>
            <option {{$selectedSolteiro}} value="Solteiro">Solteiro</option>
            <option {{$selectedCasado}} value="Casado">Casado</option>
        </select>
    </div>
</div>