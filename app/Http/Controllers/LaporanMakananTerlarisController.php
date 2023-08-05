<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanMakananTerlarisController extends Controller
{
    public function indexmakananterlaris()
    {
        $users = UsersModel::select('*')
            ->get();

        $user = Auth::user();
        $query_chart = "SELECT
        hasil.nama_makanan,
        hasil.total_barang_terlaris
    FROM(
            select
                nama_makanan,
                SUM(jumlah) AS total_barang_terlaris,
                harga,
                SUM(jumlah) * harga AS total_penjualan
            from
                transaksi_penjualan_makanan
            group by
                nama_makanan,
                harga
            UNION ALL
            select
                m.nama_makanan,
                SUM(pd.jumlah) AS total_barang_terlaris,
                pd.harga_satuan AS harga,
                SUM(pd.jumlah) * pd.harga_satuan AS total_penjualan
            from
                pesanan p
                LEFT JOIN pesanan_detail pd ON pd.id_pesanan = p.id_pesanan
                LEFT JOIN makanan m ON m.id_makanan = pd.id_item
            where
                p.status = 2
            group by
                m.nama_makanan,
                pd.harga_satuan
        ) hasil
    WHERE
        hasil.nama_makanan IS NOT NULL
    GROUP BY
        hasil.nama_makanan,
        hasil.total_barang_terlaris
    ORDER BY
        SUM(hasil.total_barang_terlaris) DESC";
        $hasil_chart = DB::select($query_chart);

        if ($user->role == 'admin') {
            return view('admin.Laporan.MakananTerlaris.index', ['users' => $users, 'hasil_chart' => $hasil_chart]);
        } else if ($user->role == 'user') {
            return view('Laporan.MakananTerlaris.index', ['users' => $users, 'hasil_chart' => $hasil_chart]);
        }
    }

    public function cetakmakananterlaris($tglawal, $tglakhir)
    {
        // dd(date('dmY',strtotime($tglawal)));
        $users = UsersModel::select('*')
            ->get();
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $query = "SELECT
        hasil.nama_makanan,
        SUM(hasil.total_barang_terlaris) AS total_barang_terlaris,
        hasil.harga
    FROM(
            select
                nama_makanan,
                SUM(jumlah) AS total_barang_terlaris,
                harga,
                SUM(jumlah) * harga AS total_penjualan
            from
                transaksi_penjualan_makanan
            where
            DATE_FORMAT(created_at, '%Y-%m-%d') between '" . $tglawal . "'
                and '" . $tglakhir . "'
            group by
                nama_makanan,
                harga
            UNION ALL
            select
                m.nama_makanan,
                SUM(pd.jumlah) AS total_barang_terlaris,
                pd.harga_satuan AS harga,
                SUM(pd.jumlah) * pd.harga_satuan AS total_penjualan
            from
                pesanan p
                LEFT JOIN pesanan_detail pd ON pd.id_pesanan = p.id_pesanan
                LEFT JOIN makanan m ON m.id_makanan = pd.id_item
            where
            DATE_FORMAT(p.created_at, '%Y-%m-%d') between '" . $tglawal . "'
            and '" . $tglakhir . "'
                and p.status = 2
            group by
                m.nama_makanan,
                pd.harga_satuan
        ) hasil
    WHERE
        hasil.nama_makanan IS NOT NULL
    GROUP BY
        hasil.nama_makanan,
        hasil.total_barang_terlaris,
        hasil.harga
    ORDER BY
        SUM(hasil.total_barang_terlaris) DESC";
        $makanan_terlaris = DB::select($query);

        $query_chart = "SELECT
        hasil.nama_makanan,
        hasil.total_barang_terlaris
    FROM(
            select
                nama_makanan,
                SUM(jumlah) AS total_barang_terlaris,
                harga,
                SUM(jumlah) * harga AS total_penjualan
            from
                transaksi_penjualan_makanan
            where
            DATE_FORMAT(created_at, '%Y-%m-%d') between '" . $tglawal . "'
                and '" . $tglakhir . "'
            group by
                nama_makanan,
                harga
            UNION ALL
            select
                m.nama_makanan,
                SUM(pd.jumlah) AS total_barang_terlaris,
                pd.harga_satuan AS harga,
                SUM(pd.jumlah) * pd.harga_satuan AS total_penjualan
            from
                pesanan p
                LEFT JOIN pesanan_detail pd ON pd.id_pesanan = p.id_pesanan
                LEFT JOIN makanan m ON m.id_makanan = pd.id_item
            where
            DATE_FORMAT(p.created_at, '%Y-%m-%d') between '" . $tglawal . "'
                and '" . $tglakhir . "'
                and p.status = 2
            group by
                m.nama_makanan,
                pd.harga_satuan
        ) hasil
    WHERE
        hasil.nama_makanan IS NOT NULL
    GROUP BY
        hasil.nama_makanan,
        hasil.total_barang_terlaris
    ORDER BY
        SUM(hasil.total_barang_terlaris) DESC";
        $hasil_chart = DB::select($query_chart);
        // $makanan_terlaris = DB::table('transaksi_penjuaslan_makanan')->select('nama_makanan', DB::raw('SUM(jumlah) AS total_barang_terlaris'), 'harga', DB::raw('SUM(jumlah) * harga AS total_penjualan'))->whereBetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [$tglawal, $tglakhir])->groupBy('nama_makanan', 'harga')->orderByRaw('SUM(jumlah) DESC')->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            $pdf = PDF::loadView('admin.Laporan.MakananTerlaris.laporan', ['makanan_terlaris' => $makanan_terlaris, 'users' => $users, 'hasil_chart' => $hasil_chart], compact('tglawal', 'tglakhir'));
            return $pdf->stream('Laporan-Data-Makanan-Terlaris.pdf');
        } else {

            // return view('Laporan.MakananTerlaris.laporan', ['makanan_terlaris' => $makanan_terlaris, 'users' => $users, 'hasil_chart' => $hasil_chart], compact('tglawal', 'tglakhir'));
            $pdf = PDF::loadView('Laporan.MakananTerlaris.laporan', ['makanan_terlaris' => $makanan_terlaris, 'users' => $users, 'hasil_chart' => $hasil_chart], compact('tglawal', 'tglakhir'));
            return $pdf->stream('Laporan-Data-Makanan-Terlaris.pdf');
        }

        // dd($makanan_terlaris);


    }
}
