<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use App\Models\MasterDataMakananModel;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;

class LaporanStokController extends Controller
{
    public function indexstokalat()
    {
        $users = UsersModel::select('*')
            ->get();
        $stok = MasterDataAlatModel::join('stok_alat', 'alat.id_alat', '=', 'stok_alat.id_alat')
            ->get(['alat.nama_alat', 'stok_alat.stok_masuk', 'stok_alat.stok_keluar']);

        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Stok.StokAlat.index', ['stok' => $stok, 'users' => $users]);
        } else if ($user->role == 'user') {
            return view('Stok.StokAlat.index', ['stok' => $stok, 'users' => $users]);
        }
    }

    public function cetaklaporanstok()
    {
        $users = UsersModel::select('*')
            ->get();
        $stok = MasterDataAlatModel::join('stok_alat', 'alat.id_alat', '=', 'stok_alat.id_alat')
            ->get(['alat.nama_alat', 'stok_alat.stok_masuk', 'stok_alat.stok_keluar']);

        $pdf = PDF::loadView('Laporan.LaporanStok.laporan', ['stok' => $stok, 'users' => $users]);
        return $pdf->stream('Laporan-Data-Stok-Alat.pdf');
    }

    public function indexstokfrozenfood()
    {
        $users = UsersModel::select('*')
            ->get();
        $stok = MasterDataMakananModel::join('stok_frozen_food', 'makanan.id_makanan', '=', 'stok_frozen_food.id_makanan')
            ->get(['makanan.nama_makanan', 'stok_frozen_food.stok_masuk', 'stok_frozen_food.stok_keluar']);

        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.Stok.StokFrozenFood.index', ['stok' => $stok, 'users' => $users]);
        } else if ($user->role == 'user') {
            return view('Stok.StokFrozenFood.index', ['stok' => $stok, 'users' => $users]);
        }
    }

    public function cetaklaporanstokfrozenfood()
    {
        $users = UsersModel::select('*')
            ->get();
        $stok = MasterDataMakananModel::join('stok_frozen_food', 'makanan.id_makanan', '=', 'stok_frozen_food.id_makanan')
            ->get(['makanan.nama_makanan', 'stok_frozen_food.stok_masuk', 'stok_frozen_food.stok_keluar']);
        // dd($stok);
        // return view('Laporan.LaporanStok.laporan_frozen', ['stok' => $stok, 'users' => $users]);
        $pdf = PDF::loadView('Laporan.LaporanStok.laporan_frozen', ['stok' => $stok, 'users' => $users]);
        return $pdf->stream('Laporan-Data-Stok-Frozen-Food.pdf');
    }
}
