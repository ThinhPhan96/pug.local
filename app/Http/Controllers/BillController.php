<?php

namespace App\Http\Controllers;

use App\Exports\BillExport;
use App\Model\BillModel;
use App\Model\CollectModel;
use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Exports\UsersExport;

class BillController extends Controller
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
        $data['pays'] = UserModel::find($id)->connectPay;
        $data['user'] = UserModel::find($id);
        return view('bill.index', $data);
    }

    public function export()
    {
        return Excel::download(new BillExport(), 'bill.xlsx');
    }
}
