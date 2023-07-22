<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiFrozenFoodModel;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanPembelianFrozenFoodController extends Controller
{
    public function indexlaporanpembelianfrozenfood()
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_frozen_food = TransaksiFrozenFoodModel::select('*')
            ->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Laporan.LaporanPembelianFrozenFood.index', ['transaksi_frozen_food' => $transaksi_frozen_food, 'users' => $users]);
        } else if ($user->role == 'user') {
            return view('Laporan.LaporanPembelianFrozenFood.index', ['transaksi_frozen_food' => $transaksi_frozen_food, 'users' => $users]);
        }
    }

    public function cetaklaporanpembelianfrozenfood($tglawal, $tglakhir)
    {

        $users = UsersModel::select('*')
            ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = TransaksiFrozenFoodModel::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [$tglawal, $tglakhir])->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            $pdf = PDF::loadView('admin.Laporan.LaporanPembelianFrozenFood.laporan', ['tanggal' => $tanggal, 'users' => $users], compact('tglawal', 'tglakhir'));
            return $pdf->stream('Laporan-Data-Transaksi-Pembelian-Frozen-Food.pdf');
        } else {

            // return view('Laporan.LaporanPembelianFrozenFood.laporan', ['tanggal' => $tanggal, 'users' => $users], compact('tglawal', 'tglakhir'));
            $pdf = PDF::loadView('Laporan.LaporanPembelianFrozenFood.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
            return $pdf->stream('Laporan-Data-Transaksi-Pembelian-Frozen-Food.pdf');
        }
    }
}
