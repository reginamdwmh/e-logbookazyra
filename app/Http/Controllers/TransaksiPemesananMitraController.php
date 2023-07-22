<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiPemesananMitra;
use App\Models\MasterDataPemesananModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class TransaksiPemesananMitraController extends Controller
{
    public function indexpemesananmitra()
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::select('*')
                            ->get();

        return view ('Transaksi.TransaksiDataPemesananMitra.index', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra,'users' => $users]);
    }

    public function tambahpemesananmitra()
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_pemesanan_mitra = MasterDataPemesananModel::all();

        return view('Transaksi.TransaksiDataPemesananMitra.tambahdata', compact('transaksi_pemesanan_mitra'),['users' => $users]);
    }


    public function simpanpemesananmitra(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::create([
            'kode_pemesanan' => $request->kode_pemesanan,
            'keterangan_pemesanan' => $request->keterangan_pemesanan,
            'jumlah' => $request->jumlah,
            'biaya_admin' => $request->biaya_admin,
            'ongkir' => $request->ongkir,
            'komisi' => $request->komisi,
            'total' => $request->total,
        ]);
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indexpemesananmitra',['users' => $users]);
    }

    public function hapuspemesananmitra($id_mitra)
    {
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::where('id_mitra',$id_mitra)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indexpemesananmitra');
    }

    public function ubahpemesananmitra($id_mitra)
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::select('*')
                ->where('id_mitra',$id_mitra)
                ->get();
        $mitra = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataPemesananMitra.ubahdata', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra,'users' => $users],compact('mitra'));
    }

    public function updatepemesananmitra(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $transaksi_pemesanan_mitra = TransaksiPemesananMitra::where('id_mitra', $request->id_mitra)
                 ->update([
                    'kode_pemesanan' => $request->kode_pemesanan,
                    'keterangan_pemesanan' => $request->keterangan_pemesanan,
                    'jumlah' => $request->jumlah,
                    'biaya_admin' => $request->biaya_admin,
                    'ongkir' => $request->ongkir,
                    'komisi' => $request->komisi,
                    'total' => $request->total,
                 ]);
        $mitra = MasterDataPemesananModel::all();          
                 compact('mitra');
        Alert::success('Success', 'Data Berhasil Diubah');
       return redirect()->route('indexpemesananmitra',['users' => $users]);
    }


    // public function caripemesananmitra(Request $request)
    // {
    //     $cari = $request->cari;

    //     $transaksi_pemesanan_mitra = DB :: table('transaksi_pemesanan_mitra')
    //                     ->where('keterangan_pemesanan','like',"%".$cari."%")
    //                     ->paginate(5);
        
    //     return view ('Transaksi.TransaksiDataPemesananMitra.index', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra]);
    // }

    public function lihatpemesananmitra($id_mitra)
    {
        $users = UsersModel::select('*')
                ->get();
        $transaksi_pemesanan_mitra = TransaksiPemesananMitra::select('*')
                                 ->where('id_mitra',$id_mitra)
                                 ->get();
        $mitra = MasterDataPemesananModel::all();

        return view ('Transaksi.TransaksiDataPemesananMitra.lihatdata', ['transaksi_pemesanan_mitra' => $transaksi_pemesanan_mitra,'users' => $users],compact('mitra'));
    }
}
