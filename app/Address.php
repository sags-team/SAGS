<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = ['cep', 'country', 'state', 'city', 'neighborhood', 'number', 'complement', 'street'];
    protected $dates = ['created_at', 'updated_at'];

    public function addressable(){
        return $this->morphTo();
    }
}
