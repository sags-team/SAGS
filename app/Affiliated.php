<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliated extends Model
{
    protected $table = 'affiliates';
    protected $fillable = ['name', 'cpf', 'sex', 'email'];
    protected $dates = ['created_at', 'updated_at'];

    public function branch(){
        return $this->belongsTo('App\Branch', 'branch_id');
    }
}
