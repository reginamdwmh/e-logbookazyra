<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use App\Models\Absen;
use Barryvdh\DomPDF\Facade\PDF;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenController extends Controller
{
    public function indexabsen()
    {
        $users = UsersModel::select('*')->get();
        $absen = Absen::select('*')
                ->get();
        return view('Absen.index',['absen' => $absen, 'users' => $users]);
    }

    public function tambahabsen()
    {
        $users = UsersModel::select('*')->get();
        $absen = Absen::select('*')
                ->get();
        return view('Absen.tambahabsen',['absen' => $absen, 'users' => $users]);
    }

    public function simpanabsen(Request $request)
    {
        $users = UsersModel::select('*')->get();
        $absen = Absen::create([
            'NIS' => $request->NIS,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexabsen',['absen' => $absen, 'users' => $users]);
    }

    public function hapusabsen($id)
    {
        $absen = Absen::where('id', $id)
            ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');        
        return redirect()->route('indexabsen');
    }

    public function ubahabsen($id)
    {
        $users = UsersModel::select('*')->get();
        $absen = Absen::select('*')
                ->where('id',$id)
                ->get();

        return view ('Absen.ubahabsen', ['absen' =>$absen, 'users' => $users]);
    }

    public function updateabsen(Request $request)
    {
        $users = UsersModel::select('*')->get();
       $absen = Absen::where('id', $request->id)
                 ->update([
                    'NIS' => $request->NIS,
                    'keterangan' => $request->keterangan,
                    'tanggal' => $request->tanggal,
                 ]);
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexabsen',['absen' => $absen, 'users' => $users]);
    }

    public function cetaklaporanabsen()
    {
        $users = UsersModel::select('*')
                ->get();
        $absen = Absen::select('*')
                ->get();

        $pdf = PDF::loadView('Absen.laporan',['absen'=>$absen,'users'=>$users]);
        return $pdf->stream('Laporan-Data-Absen.pdf');
    }
}
