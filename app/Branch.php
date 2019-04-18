<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    protected $fillable = ['name', 'code', 'active'];
    protected $dates = ['created_at', 'updated_at'];

    public function Affiliates(){
        return $this->hasMany('App\Affiliated', 'branch_id');
    }
}
