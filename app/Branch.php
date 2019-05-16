<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    protected $fillable = ['name', 'code', 'active', 'cnpj', 'minContribution'];
    protected $dates = ['created_at', 'updated_at'];

    public function affiliates(){
        return $this->hasMany('App\Affiliated', 'branch_id');
    }

    public function address(){
        return $this->morphOne('App\Address', 'addressable');
    }

    public function telephones(){
        return $this->morphMany('App\Telephone', 'telephoneable');
    }

    public function users(){
        return $this->hasMany('App\User', 'branch_id');
    }

    public function bankInfos()
    {
        return $this->hasMany('App\BankInfo', 'branch_id');
    }
}
