<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['ddd', 'number', 'ddi'];
    protected $dates = ['created_at', 'updated_at'];

    public function telephoneable(){
        return $this->morphTo();
    }
}
