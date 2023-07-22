<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PesananModel;

class LaporanDataPenjualanOnlineController extends Controller
{
    public function indexlaporanpenjualanonline()
    {
        $users = UsersModel::select('*')
                 ->get();
        $pesanan = PesananModel::join('users', 'users.id', 'pesanan.user_id')->select('pesanan.*', 'users.name')->where('status', '2')->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataPenjualanOnline.index',['pesanan' => $pesanan,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataPenjualanOnline.index',['pesanan' => $pesanan,'users' => $users]);
        }
    }
}
