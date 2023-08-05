<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\PesananModel;
use App\Models\PesananDetailModel;

class LaporanDataPenjualanOnlineController extends Controller
{
    public function indexlaporanpenjualanonline()
    {
        $users = UsersModel::select('*')
            ->get();
        $pesanan = PesananModel::join('users', 'users.id', 'pesanan.user_id')->select('pesanan.*', 'users.name')->orderBy('id_pesanan', 'DESC')->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Laporan.LaporanDataPenjualanOnline.index', ['pesanan' => $pesanan, 'users' => $users]);
        } else if ($user->role == 'user') {
            return view('Laporan.LaporanDataPenjualanOnline.index', ['pesanan' => $pesanan, 'users' => $users]);
        }
    }

    public function detail_laporan_online($id_pesanan)
    {
        $users = UsersModel::select('*')
            ->get();
        $data_penjualan = PesananModel::where('id_pesanan', $id_pesanan)
            ->first();
        $data_penjualan_detail = PesananDetailModel::join('makanan', 'makanan.id_makanan', 'pesanan_detail.id_item')->select('pesanan_detail.*', 'makanan.nama_makanan')->where('id_pesanan', $id_pesanan)->get();

        // dd($data_penjualan_detail);
        return view('public.checkout.detail', ['users' => $users, 'data_penjualan' => $data_penjualan, 'data_penjualan_detail' => $data_penjualan_detail]);
    }
}