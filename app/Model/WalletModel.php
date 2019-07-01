<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    protected $table = 'wallets';

    public function walletCollect()
    {
        return $this->hasMany('App\Model\CollectModel', 'wallet_id', 'id');
    }

    public function walletPay()
    {
        return $this->hasMany('App\Model\PayModel', 'wallet_id', 'id');
    }
}
