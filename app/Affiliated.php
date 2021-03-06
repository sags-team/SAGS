<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliated extends Model
{
    protected $table = 'affiliates';
    protected $fillable = ['name', 'cpf', 'sex', 'email', 'siape', 'rg', 'maritalStat', 'educationDegree', 'workDegree', 'contribution'];
    protected $dates = ['created_at', 'updated_at'];

    public function branch(){
        return $this->belongsTo('App\Branch', 'branch_id');
    }

    public function address(){
        return $this->morphOne('App\Address', 'addressable');
    }

    public function telephones(){
        return $this->morphMany('App\Telephone', 'telephoneable');
    }

    public function bankAccount(){
        return $this->hasOne('App\BankAccount', 'affiliated_id');
    }
}
