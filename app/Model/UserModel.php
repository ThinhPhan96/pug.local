<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table = 'users';
    public function connectWallet()
    {
        return $this->hasOne('App\Model\WalletModel', 'user_id', 'id');
    }

    public function connectCollect()
    {
        return $this->hasMany('App\Model\CollectModel', 'user_id', 'id');
    }

    public function connectPay()
    {
        return $this->hasMany('App\Model\PayModel', 'user_id', 'id');
    }
}
