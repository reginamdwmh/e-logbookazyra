<?php

namespace App\Http\Controllers;

use App\Models\ShiftModel;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanShiftKasController extends Controller
{
    public function indexshiftkas()
    {
        $users = UsersModel::select('*')
            ->get();
        $shift_kas = ShiftModel::select('*')
            ->get();

        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Laporan.ShiftKas.index', ['shift_kas' => $shift_kas, 'users' => $users]);
        }
    }

    public function cetakshiftkas($tglawal, $tglakhir)
    {
        $users = UsersModel::select('*')
            ->get();
        $tglawal = date('Y-m-d', strtotime($tglawal));
        $tglakhir = date('Y-m-d', strtotime($tglakhir));
        $tanggal = ShiftModel::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [$tglawal, $tglakhir])->get();
        // $last = ShiftModel::wherebetween(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), [$tglawal, $tglakhir])->orderBy('updated_at', 'desc')->first();

        $user = Auth::user();
        if ($user->role == 'admin') {
            // return view('admin.Laporan.ShiftKas.laporan', ['tanggal' => $tanggal, 'users' => $users, 'last' => $last], compact('tglawal', 'tglakhir'));
            $pdf = PDF::loadView('admin.Laporan.ShiftKas.laporan', ['tanggal' => $tanggal, 'users' => $users], compact('tglawal', 'tglakhir'));
            return $pdf->stream('Laporan-Data-Shift-Kas.pdf');
        }
    }
}
