<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = ['displayName' ,'name', 'agency', 'operationCode', 'accountNumber', 'vdNumber', 'active'];
    protected $dates = ['created_at', 'updated_at'];

    public function bankAccount(){
        return $this->belongsTo('App\Affiliated', 'affiliated_id');
    }
}
