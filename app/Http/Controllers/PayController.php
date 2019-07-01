<?php

namespace App\Http\Controllers;

use App\Model\PayModel;
use App\Model\UserModel;
use App\Model\WalletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $id = Auth::id();
        $data['pays'] = UserModel::find($id)->connectPay;
        $data['user'] = UserModel::find($id);
        return view('pay.index', $data);
    }

    public function create()
    {
        $id = Auth::id();
        $data = UserModel::find($id)->connectPay->where('user_id', $id)->first();
        $data['user'] = UserModel::all();
        return view('pay.submit', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'money' => 'required|numeric|min:0|max:500000',
        ]);
        $id = Auth::id();
        $data = new PayModel();
        $userId = UserModel::find($id);
        $walletId = UserModel::find($id)->connectWallet;
        $data->user_id = $userId['id'];
        $data->wallet_id = $walletId['id'];
        $data2 = WalletModel::find($data->wallet_id);
        $data2->money -= $request['money'];
        $data->name = $request['name'];
        $data->money = $request['money'];
        $data->desc = isset($request['desc']) ? $request['desc'] : '';
        $data->save();
        $data2->save();
        return redirect('user/pay');
    }
}
