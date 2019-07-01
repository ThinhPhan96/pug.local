<?php

namespace App\Http\Controllers;

use App\Model\UserModel;
use App\Model\WalletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data['users'] = UserModel::find($id);
        $data['wallet'] = UserModel::find($id)->connectWallet;
        return view('user.index', $data);
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $data = array();
        $data['users'] = UserModel::find($id);
        return view('user.edit', $data);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->save();
        return redirect('user');
    }
    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Mật khẩu cũ không khớp . Mời nhập lại");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "Mật khẩu mới giống mật khẩu cũ. Hãy chọn mật khẩu khác.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Mật khẩu đã được thay đổi !");
    }
}
