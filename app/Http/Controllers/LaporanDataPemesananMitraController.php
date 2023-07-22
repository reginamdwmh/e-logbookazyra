<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPemesananMitra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Auth;

class LaporanDataPemesananMitraController extends Controller
{
    public function indexlaporanpemesananmitra()
    {
        $users = UsersModel::select('*')
                 ->get();
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::select('*')
                        ->get();

        $user = Auth::user();
        if($user->role == 'admin'){
            return view('admin.Laporan.LaporanDataPemesananMitra.index', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra,'users' => $users]);
        } else if($user->role == 'user'){
            return view('Laporan.LaporanDataPemesananMitra.index', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra,'users' => $users]);
        }

    }


    public function cetaklaporantransaksipemesananmitra($tglawal, $tglakhir){

        $users = UsersModel::select('*')
                 ->get();
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        // $transaksi_bahan = TransaksiBahanModel::whereBetween('created_at',[$tglawal, $tglakhir]);
        // return view('Laporan.LaporanDataBahan.index', compact('transaksi_bahan'));
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = TransaksiPemesananMitra::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"),[$tglawal, $tglakhir])->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            $pdf = PDF::loadView('admin.Laporan.LaporanDataPemesananMitra.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
            return $pdf->stream('Laporan-Data-Transaksi-Pemesanan-Mitra.pdf');
        } else {

            $pdf = PDF::loadView('Laporan.LaporanDataPemesananMitra.laporan', ['tanggal' => $tanggal,'users' => $users],compact('tglawal','tglakhir'));
        return $pdf->stream('Laporan-Data-Transaksi-Pemesanan-Mitra.pdf');
        }

            
    }
}
