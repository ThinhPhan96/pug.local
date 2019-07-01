<?php

namespace App\Http\Controllers;

use App\Model\CollectModel;
use App\Model\UserModel;
use App\Model\WalletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $id = Auth::id();
        $data['collects'] = UserModel::find($id)->connectCollect;
        $data['user'] = UserModel::find($id);
        return view('collect.index', $data);
    }

    public function create()
    {
        $id = Auth::id();
        $data = UserModel::find($id)->connectCollect->where('user_id', $id)->first();
        $data['user'] = UserModel::all();
        return view('collect.submit', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'money' => 'required|numeric|min:0|max:5000000',
            'desc' => 'required',
        ]);
        $id = Auth::id();
        $data = new CollectModel();
        $userId = UserModel::find($id);
        $walletId = UserModel::find($id)->connectWallet;
        $data->user_id = $userId['id'];
        $data->wallet_id = $walletId['id'];
        $data2 = WalletModel::find($data->wallet_id);
        $data2->money += $request['money'];
        $data->name = $request['name'];
        $data->money = $request['money'];
        $data->desc = isset($request['desc']) ? $request['desc'] : '';
        $data->save();
        $data2->save();
        return redirect('user/collect');
    }
}
