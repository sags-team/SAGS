<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    //
    protected $fillable = ['name', 'agreementCode', 'branchName','bankCode', 'fileCounter'];
    protected $dates = ['created_at', 'updated_at'];

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }

}
