<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanOmzetPertahunController extends Controller
{
    public function indexomzetpertahun()
    {
        $users = UsersModel::select('*')
            ->get();

        $query = "SELECT
            hasil_total.bulan,
            SUM(hasil_total.total_offline) AS total_offline,
            SUM(hasil_total.total_online) AS total_online,
            SUM(hasil_total.total_mitra) AS total_mitra
        FROM(
                SELECT
                    CASE
                        WHEN hasil_offline.bulan = '01' THEN 'JAN'
                        WHEN hasil_offline.bulan = '02' THEN 'FEB'
                        WHEN hasil_offline.bulan = '03' THEN 'MAR'
                        WHEN hasil_offline.bulan = '04' THEN 'APR'
                        WHEN hasil_offline.bulan = '05' THEN 'MEI'
                        WHEN hasil_offline.bulan = '06' THEN 'JUN'
                        WHEN hasil_offline.bulan = '07' THEN 'JUL'
                        WHEN hasil_offline.bulan = '08' THEN 'AGS'
                        WHEN hasil_offline.bulan = '09' THEN 'SEP'
                        WHEN hasil_offline.bulan = '10' THEN 'OKT'
                        WHEN hasil_offline.bulan = '11' THEN 'NOV'
                        ELSE 'DES'
                    END AS bulan,
                    COALESCE(SUM(tpm.total), 0) AS total_offline,
                    0 AS total_online,
                    0 AS total_mitra
                FROM(
                        SELECT
                            '01' AS bulan
                        UNION ALL
                        SELECT
                            '02'
                        UNION ALL
                        SELECT
                            '03'
                        UNION ALL
                        SELECT
                            '04'
                        UNION ALL
                        SELECT
                            '05'
                        UNION ALL
                        SELECT
                            '06'
                        UNION ALL
                        SELECT
                            '07'
                        UNION ALL
                        SELECT
                            '08'
                        UNION ALL
                        SELECT
                            '09'
                        UNION ALL
                        SELECT
                            '10'
                        UNION ALL
                        SELECT
                            '11'
                        UNION ALL
                        SELECT
                            '12'
                    ) hasil_offline
                    LEFT JOIN transaksi_penjualan_makanan tpm ON DATE_FORMAT(tpm.created_at, '%m') = hasil_offline.bulan
                    AND DATE_FORMAT(tpm.created_at, '%Y') = '" . date('Y') . "'
                GROUP BY
                    hasil_offline.bulan
                UNION ALL
                SELECT
                    CASE
                        WHEN hasil_online.bulan = '01' THEN 'JAN'
                        WHEN hasil_online.bulan = '02' THEN 'FEB'
                        WHEN hasil_online.bulan = '03' THEN 'MAR'
                        WHEN hasil_online.bulan = '04' THEN 'APR'
                        WHEN hasil_online.bulan = '05' THEN 'MEI'
                        WHEN hasil_online.bulan = '06' THEN 'JUN'
                        WHEN hasil_online.bulan = '07' THEN 'JUL'
                        WHEN hasil_online.bulan = '08' THEN 'AGS'
                        WHEN hasil_online.bulan = '09' THEN 'SEP'
                        WHEN hasil_online.bulan = '10' THEN 'OKT'
                        WHEN hasil_online.bulan = '11' THEN 'NOV'
                        ELSE 'DES'
                    END AS bulan,
                    0 AS total_offline,
                    COALESCE(SUM(p.total), 0) AS total_online,
                    0 AS total_mitra
                FROM(
                        SELECT
                            '01' AS bulan
                        UNION ALL
                        SELECT
                            '02'
                        UNION ALL
                        SELECT
                            '03'
                        UNION ALL
                        SELECT
                            '04'
                        UNION ALL
                        SELECT
                            '05'
                        UNION ALL
                        SELECT
                            '06'
                        UNION ALL
                        SELECT
                            '07'
                        UNION ALL
                        SELECT
                            '08'
                        UNION ALL
                        SELECT
                            '09'
                        UNION ALL
                        SELECT
                            '10'
                        UNION ALL
                        SELECT
                            '11'
                        UNION ALL
                        SELECT
                            '12'
                    ) hasil_online
                    LEFT JOIN pesanan p ON DATE_FORMAT(p.created_at, '%m') = hasil_online.bulan
                    AND DATE_FORMAT(p.created_at, '%Y') = '" . date('Y') . "'
                    AND p.status = '2'
                GROUP BY
                    hasil_online.bulan
                UNION ALL
                SELECT
                    CASE
                        WHEN hasil_mitra.bulan = '01' THEN 'JAN'
                        WHEN hasil_mitra.bulan = '02' THEN 'FEB'
                        WHEN hasil_mitra.bulan = '03' THEN 'MAR'
                        WHEN hasil_mitra.bulan = '04' THEN 'APR'
                        WHEN hasil_mitra.bulan = '05' THEN 'MEI'
                        WHEN hasil_mitra.bulan = '06' THEN 'JUN'
                        WHEN hasil_mitra.bulan = '07' THEN 'JUL'
                        WHEN hasil_mitra.bulan = '08' THEN 'AGS'
                        WHEN hasil_mitra.bulan = '09' THEN 'SEP'
                        WHEN hasil_mitra.bulan = '10' THEN 'OKT'
                        WHEN hasil_mitra.bulan = '11' THEN 'NOV'
                        ELSE 'DES'
                    END AS bulan,
                    0 AS total_offline,
                    0 AS total_online,
                    COALESCE(SUM(tpo.total), 0) AS total_mitra
                FROM(
                        SELECT
                            '01' AS bulan
                        UNION ALL
                        SELECT
                            '02'
                        UNION ALL
                        SELECT
                            '03'
                        UNION ALL
                        SELECT
                            '04'
                        UNION ALL
                        SELECT
                            '05'
                        UNION ALL
                        SELECT
                            '06'
                        UNION ALL
                        SELECT
                            '07'
                        UNION ALL
                        SELECT
                            '08'
                        UNION ALL
                        SELECT
                            '09'
                        UNION ALL
                        SELECT
                            '10'
                        UNION ALL
                        SELECT
                            '11'
                        UNION ALL
                        SELECT
                            '12'
                    ) hasil_mitra
                    LEFT JOIN transaksi_pemesanan_mitra tpo ON DATE_FORMAT(tpo.created_at, '%m') = hasil_mitra.bulan
                    AND DATE_FORMAT(tpo.created_at, '%Y') = '" . date('Y') . "'
                GROUP BY
                    hasil_mitra.bulan
            ) hasil_total
        GROUP BY
            hasil_total.bulan
        ORDER BY
            CASE
                WHEN hasil_total.bulan = 'JAN' THEN 1
                WHEN hasil_total.bulan = 'FEB' THEN 2
                WHEN hasil_total.bulan = 'MAR' THEN 3
                WHEN hasil_total.bulan = 'APR' THEN 4
                WHEN hasil_total.bulan = 'MEI' THEN 5
                WHEN hasil_total.bulan = 'JUN' THEN 6
                WHEN hasil_total.bulan = 'JUL' THEN 7
                WHEN hasil_total.bulan = 'AGS' THEN 8
                WHEN hasil_total.bulan = 'SEP' THEN 9
                WHEN hasil_total.bulan = 'OKT' THEN 10
                WHEN hasil_total.bulan = 'NOV' THEN 11
                WHEN hasil_total.bulan = 'DES' THEN 12
            END";
        $grafik = DB::select($query);
        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Laporan.OmzetPertahun.index', ['users' => $users, 'grafik' => $grafik]);
        } else if ($user->role == 'user') {
            return view('Laporan.OmzetPertahun.index', ['users' => $users, 'grafik' => $grafik]);
        }
    }

    public function cetakomzerpertahun($tahun)
    {
        // dd($tahun);
        $users = UsersModel::select('*')
            ->get();
        $query = "SELECT
        hasil.bulan,
        COALESCE(SUM(tpm.total),0) AS omzet
    FROM(
            SELECT
                '01' AS bulan
            UNION ALL
            SELECT
                '02'
            UNION ALL
            SELECT
                '03'
            UNION ALL
            SELECT
                '04'
            UNION ALL
            SELECT
                '05'
            UNION ALL
            SELECT
                '06'
            UNION ALL
            SELECT
                '07'
            UNION ALL
            SELECT
                '08'
            UNION ALL
            SELECT
                '09'
            UNION ALL
            SELECT
                '10'
            UNION ALL
            SELECT
                '11'
            UNION ALL
            SELECT
                '12'
        ) hasil
        LEFT JOIN transaksi_penjualan_makanan tpm ON DATE_FORMAT(tpm.created_at, '%m') = hasil.bulan AND DATE_FORMAT(tpm.created_at, '%Y') = '" . $tahun . "'
    GROUP BY
        hasil.bulan
    ORDER BY
        hasil.bulan";
        // $omzet_pertahun = DB::table('transaksi_penjualan_makanan')->select(DB::raw("DATE_FORMAT(created_at, '%m') AS bulan"), DB::raw("COALESCE(SUM(total),0) AS omzet"))->whereYear('created_at', $tahun)->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))->orderBy(DB::raw("DATE_FORMAT(created_at, '%m')"))->get();
        $omzet_pertahun = DB::select($query);

        $user = Auth::user();
        if ($user->role == 'admin') {
            $pdf = PDF::loadView('admin.Laporan.OmzetPertahun.laporan', ['omzet_pertahun' => $omzet_pertahun, 'users' => $users], compact('tahun'));
            return $pdf->stream('Laporan-Data-Omzet-Pertahun.pdf');
        } else {

            $pdf = PDF::loadView('Laporan.OmzetPertahun.laporan', ['omzet_pertahun' => $omzet_pertahun, 'users' => $users], compact('tahun'));
            return $pdf->stream('Laporan-Data-Omzet-Pertahun.pdf');
        }


        // dd($omzet_pertahun);

    }
}
