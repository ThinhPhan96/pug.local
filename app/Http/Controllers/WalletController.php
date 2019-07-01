<?php

namespace App\Http\Controllers;

use App\Model\CollectModel;
use App\Model\PayModel;
use App\Model\UserModel;
use App\Model\WalletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $id = Auth::id();
        $data['wallet'] = UserModel::find($id)->connectWallet;
        $data['user'] = UserModel::find($id);
        return view('wallet.index', $data);
    }

    public function create()
    {
        $id = Auth::id();
        $data = array();
        $data['wallet'] = UserModel::find($id)->connectWallet;
        $data['user'] = UserModel::all();
        return view('wallet.submit', $data);
    }

    public function edit()
    {
        $id = Auth::id();
        $data = array();
        $data['wallet'] = UserModel::find($id)->connectWallet;
        return view('wallet.edit', $data);
    }

    public function delete()
    {
        $id = Auth::id();
        $data['wallet'] = UserModel::find($id)->connectWallet;
        return view('wallet.delete', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $id = Auth::id();
        $data = new WalletModel();
        $userId = UserModel::find($id);
        $data->user_id = $userId['id'];
        $data->name = $request['name'];
        $data->save();
        return redirect('user/wallet');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $id = Auth::user()->id;
        $data = UserModel::find($id)->connectWallet;
        $data->name = $request['name'];
        $data->save();
        return redirect('user/wallet');
    }

    public function destroy()
    {
        $id = Auth::user()->id;
        UserModel::findOrFail($id)->connectWallet->delete();
        CollectModel::where('user_id', $id)->delete();
        PayModel::where('user_id', $id)->delete();

        return redirect('user');
    }

    public function transport()
    {
        $id = Auth::id();
        $data = array();
        $data['wallet'] = WalletModel::all();
        $data['user'] = UserModel::find($id);
        return view('wallet.transport', $data);
    }

    public function transporter(Request $request)
    {
        $validatedData = $request->validate([
            'money' => 'bail|required|numeric|max:5000|min:0',
        ]);
        $id = Auth::id();
        $data = UserModel::find($id)->connectWallet;
        $id2 = (int) $request['id'];
        $data2 = WalletModel::find($id2);
        if ($data->id == $id2) {
            $data->save();
            $data2->save();
        } else {
            $data->money -= $request['money'];
            $data2->money += $request['money'];
            $data->save();
            $data2->save();
        }

        return redirect('user/wallet');
    }
}
