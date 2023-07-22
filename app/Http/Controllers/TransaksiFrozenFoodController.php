<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiFrozenFoodModel;
use App\Models\MasterDataMakananModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class TransaksiFrozenFoodController extends Controller
{
    public function indextransaksifrozenfood(Request $request)
    {
        // if ($request->ajax()) {
        //     return DataTables::of(TransaksiBahanModel::query())->toJson();
        // }

        // return view ('Transaksi.TransaksiDataBahan.index');
        $users = UsersModel::select('*')
            ->get();
        $transaksi_frozen_food = TransaksiFrozenFoodModel::select('*')
            ->get();

        return view('Transaksi.TransaksiDataFrozenFood.index', ['transaksi_frozen_food' => $transaksi_frozen_food, 'users' => $users]);
    }

    public function tambahtransaksifrozenfood()
    {
        $users = UsersModel::select('*')
            ->get();
        $makanan = MasterDataMakananModel::where('nama_kategori', '=', 'Frozen Food')->get();
        // dd($makanan);
        return view('Transaksi.TransaksiDataFrozenFood.tambahdata', compact('makanan'), ['users' => $users]);
    }

    public function simpantransaksifrozenfood(Request $request)
    {
        // $users = UsersModel::select('*')
        //         ->get();   
        // $transaksi_bahan = TransaksiBahanModel::create([
        //     'nama_bahan' => $request->nama_bahan,
        //     'harga' => $request->harga,
        //     'jumlah' => $request->jumlah,
        //     'total' => $request->total,
        // ]);
        // Alert::success('Success', 'Data Berhasil Disimpan');
        // return redirect()->route('indextransaksibahan',['users' => $users]);

        $users = UsersModel::select('*')
            ->get();

        $request->validate([
            'addMoreInputFields.*.nama_makanan' => 'required',
            'addMoreInputFields.*.harga' => 'required',
            'addMoreInputFields.*.jumlah' => 'required',
            'addMoreInputFields.*.total' => 'required',
        ]);

        foreach ($request->addMoreInputFields as $key => $value) {
            $get_id_makanan = DB::table('makanan')->selectRaw('*')->where('nama_makanan', '=', $value['nama_makanan'])->first();
            $stok = DB::table('stok_frozen_food')->selectRaw('*')->where([['id_makanan', $get_id_makanan->id_makanan]])->get();
            // dd($get_id_makanan->id_makanan);
            if (count($stok) == 0) {
                DB::table('stok_frozen_food')->insert([
                    [
                        'id_makanan' => $get_id_makanan->id_makanan,
                        'stok_masuk' => $value['jumlah'],
                        'stok_keluar' => 0,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                ]);
            } else {
                DB::table('stok_frozen_food')->where([['id_makanan', $get_id_makanan->id_makanan]])->update(['stok_masuk' => $stok[0]->stok_masuk + intval(str_replace(",", "", $value['jumlah']))]);
            }
            TransaksiFrozenFoodModel::create($value);
        }

        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('indextransaksifrozenfood', ['users' => $users]);
    }

    public function hapustransaksifrozenfood($id_transaksifrozenfood)
    {
        $transaksi_frozenfood = TransaksiFrozenFoodModel::where('id_transaksi_frozen_food', $id_transaksifrozenfood)
            ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('indextransaksifrozenfood');
    }

    public function ubahtransaksifrozenfood($id_transaksifrozenfood)
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_frozenfood = TransaksiFrozenFoodModel::select('*')
            ->where('id_transaksi_frozen_food', $id_transaksifrozenfood)
            ->get();
        $makanan = MasterDataMakananModel::where('nama_kategori', '=', 'Frozen Food')->get();

        return view('Transaksi.TransaksiDataFrozenFood.ubahdata', ['transaksi_frozenfood' => $transaksi_frozenfood, 'users' => $users], compact('makanan'));
    }

    public function updatetransaksifrozenfood(Request $request)
    {
        $users = UsersModel::select('*')
            ->get();
        $transaksi_frozenfood = TransaksiFrozenFoodModel::where('id_transaksi_frozen_food', $request->id_transaksi_frozen_food)
            ->update([
                'nama_makanan' => $request->nama_makanan,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'total' => $request->total,
            ]);
        $makanan = MasterDataMakananModel::where('nama_kategori', '=', 'Frozen Food')->get();
        compact('makanan');
        Alert::success('Success', 'Data Berhasil Diupdate');
        return redirect()->route('indextransaksifrozenfood', ['users' => $users]);
    }

    // public function lihattransaksibahan($id_transaksibahan)
    // {
    //     $transaksi_bahan = TransaksiBahanModel::select('*')
    //                              ->where('id_transaksibahan',$id_transaksibahan)
    //                              ->get();


    //     return view ('Transaksi.TransaksiDataBahan.lihatdata', ['transaksi_bahan' => $transaksi_bahan],compact('transaksi_bahan'));
    // }



    // public function onchange(Request $request)
    // {
    //    $bahan['harga'] = MasterDataBahanModel::where("id_bahan", $request->id_bahan)
    //                     ->get(["harga"]);

    //     return response()->json($bahan);
    // }
}
