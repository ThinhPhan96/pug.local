<?php

namespace App\Exports;

use App\Model\CollectModel;
use App\Model\PayModel;
use App\Model\UserModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id = Auth::id();
        $data = UserModel::find($id)->connectCollect->toArray();
        $data2 = UserModel::find($id)->connectPay->toArray();
        $data3 = array_merge($data, $data2);
        $data3 = collect($data3);
        return $data3;
    }
}
