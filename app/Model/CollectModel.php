<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CollectModel extends Model
{
    //
    protected $table = 'collects';
    public function collectPay()
    {
        return $this->belongsToMany('App\Model\PayModel', 'bills', 'collect_id', 'pay_id');
    }
}
