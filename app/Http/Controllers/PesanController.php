<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataMakananModel;
use App\Models\MasterDataKategoriModel;
use App\Models\UsersModel;
use App\Models\PesananModel;
use App\Models\PesananDetailModel;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexpesan($id_makanan)
    {
        $users = UsersModel::select('*')
            ->get();
        // $makanan = MasterDataMakananModel::where('id_makanan', $id_makanan)->first();
        $makanan = MasterDataMakananModel::join('kategori', 'makanan.nama_kategori', '=', 'kategori.nama_kategori')->where('id_makanan', $id_makanan)->first(['makanan.*', 'kategori.keterangan_kategori']);
        // dd($makanan);
        // $pesanan = PesananModel::where('user_id', Auth::user()->id)
        //     ->where('status', 0)
        //     ->first();
        // $total = PesananDetailModel::where('id_pesanan', $pesanan)->count();

        // dd($total);
        return view('public.pesan.index', compact('makanan', 'users'));
    }

    public function update_user(Request $request)
    {
        $users = UsersModel::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat
            ]);
        Alert::success('Success', 'Profile Berhasil Diubah');
        return redirect()->back()->with(['users' => $users]);
    }

    public function add_to_cart(Request $request, $id_makanan)
    {
        $users = UsersModel::select('*')
            ->get();
        $stok = 0;
        $makanan = MasterDataMakananModel::where('id_makanan', $id_makanan)->first();
        if (!empty($makanan->id_alat)) {
            $datastok = MasterDataMakananModel::join('stok_alat', 'stok_alat.id_alat', '=', 'makanan.id_alat')->where('id_makanan', $id_makanan)->first(['stok_alat.stok_masuk', 'stok_alat.stok_keluar']);
            $stok = $datastok->stok_masuk - $datastok->stok_keluar;
        } else {
            $datastok = MasterDataMakananModel::join('stok_frozen_food', 'stok_frozen_food.id_makanan', '=', 'makanan.id_makanan')->where('stok_frozen_food.id_makanan', $id_makanan)->first(['stok_frozen_food.stok_masuk', 'stok_frozen_food.stok_keluar']);
            $stok = $datastok->stok_masuk - $datastok->stok_keluar;
        }

        $tanggal = Carbon::now();

        if ($request->jumlah_pesanan > $stok) {
            Alert::error('Error', 'Stok Tidak Mencukupi');
            return redirect()->back()->with(['users' => $users]);
        } else {
            $cek_pesanan = PesananModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if (empty($cek_pesanan)) {
                $pesanan = new PesananModel();
                $pesanan->user_id = Auth::user()->id;
                $pesanan->tanggal = $tanggal;
                $pesanan->status = 0;
                $pesanan->total = 0;
                $pesanan->save();
            }

            $pesanan_baru = PesananModel::where('user_id', Auth::user()->id)->where('status', 0)->first();

            $cek_pesanandetail = PesananDetailModel::where('id_item', $makanan->id_makanan)->where('id_pesanan', $pesanan_baru->id_pesanan)->first();

            if (empty($cek_pesanandetail)) {
                $pesanan_detail = new PesananDetailModel();
                $pesanan_detail->id_item = $makanan->id_makanan;
                $pesanan_detail->id_pesanan = $pesanan_baru->id_pesanan;
                $pesanan_detail->jumlah = $request->jumlah_pesanan;
                $pesanan_detail->harga_satuan = $makanan->harga;
                $pesanan_detail->catatan = $request->catatan;
                $pesanan_detail->subtotal = $makanan->harga * $request->jumlah_pesanan;
                $pesanan_detail->save();
            } else {
                $pesanan_detail = PesananDetailModel::where('id_item', $makanan->id_makanan)->where('id_pesanan', $pesanan_baru->id_pesanan)->first();

                $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesanan;

                $harga_pesanan_detail = $makanan->harga * $request->jumlah_pesanan;
                $pesanan_detail->subtotal = $pesanan_detail->subtotal + $harga_pesanan_detail;
                $pesanan_detail->update();
            }

            $pesanan = PesananModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->total = $pesanan->total + ($makanan->harga * $request->jumlah_pesanan);
            $pesanan->update();
        }
        Alert::success('Success', 'Data Berhasil Masuk Keranjang');
        return redirect()->back()->with(['users' => $users]);
    }

    public function indexcheckout()
    {
        $users = UsersModel::select('*')
            ->get();
        // $makanan = MasterDataMakananModel::where('id_makanan', $id_makanan)->first();
        // $makanan = MasterDataMakananModel::join('kategori', 'makanan.nama_kategori', '=', 'kategori.nama_kategori')->where('id_makanan', $id_makanan)->first(['makanan.*', 'kategori.keterangan_kategori']);
        // dd($makanan);
        $pesanan = PesananModel::where('user_id', Auth::user()->id)
            ->where('status', 0)
            ->first();
        if (!empty($pesanan)) {
            $pesanan_detail = PesananDetailModel::join('makanan', 'pesanan_detail.id_item', '=', 'makanan.id_makanan')->where('id_pesanan', $pesanan->id_pesanan)->get(['pesanan_detail.*', 'makanan.nama_makanan']);
        }

        // dd($total);
        if (!empty($pesanan)) {
            return view('public.checkout.index', compact('pesanan', 'pesanan_detail', 'users'));
        } else {
            return view('public.checkout.index', compact('users'));
        }
    }

    public function hapus_item($id)
    {
        $users = UsersModel::select('*')
            ->get();

        $pesanan_detail = PesananDetailModel::where('id', $id)->first();

        $pesanan = PesananModel::where('id_pesanan', $pesanan_detail->id_pesanan)->first();

        $pesanan->total = $pesanan->total - $pesanan_detail->subtotal;
        $pesanan->update();

        $pesanan_detail->delete();
        Alert::success('Success', 'Data Berhasil Dihapus dari Keranjang');
        return redirect()->back()->with(['users' => $users]);
    }

    public function confirm()
    {
        $users = UsersModel::select('*')
            ->get();
        $pesanan = PesananModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_detail = PesananDetailModel::where('id_pesanan', $pesanan->id_pesanan)->get();
        foreach ($pesanan_detail as $value) {
            $makanan = MasterDataMakananModel::where('id_makanan', $value->id_item)->first();

            if ($value->id_item == $makanan->id_makanan) {
                if (!empty($makanan->id_alat)) {
                    $stok = DB::table('stok_alat')->where('id_alat', $makanan->id_alat)->first();
                    $sisa = $stok->stok_masuk - $stok->stok_keluar;
                    if ($sisa > 0) {
                        $stok_keluar = $stok->stok_keluar + $value->jumlah;
                        DB::table('stok_alat')->where('id_alat', $makanan->id_alat)->update(['stok_keluar' => $stok_keluar]);
                    } else {
                        Alert::error('Error', 'Stok Habis');
                        return redirect()->back()->with(['users' => $users]);
                    }
                } else {
                    ## frozen food
                    $stok = DB::table('stok_frozen_food')->where('id_makanan', $makanan->id_makanan)->first();
                    $sisa = $stok->stok_masuk - $stok->stok_keluar;
                    if ($sisa > 0) {
                        $stok_keluar = $stok->stok_keluar + $value->jumlah;
                        DB::table('stok_frozen_food')->where('id_makanan', $makanan->id_makanan)->update(['stok_keluar' => $stok_keluar]);
                    } else {
                        Alert::error('Error', 'Stok Habis');
                        return redirect()->back()->with(['users' => $users]);
                    }
                }

                // dd($stok);
            }
        }

        Alert::success('Success', 'Berhasil Checkout');
        return redirect()->back()->with(['users' => $users]);
    }

    public function edit_item($id)
    {
        $users = UsersModel::select('*')
            ->get();
        $pesanan_detail = PesananDetailModel::where('id', $id)->first();
        $pesanan = PesananModel::where('id_pesanan', $pesanan_detail->id_pesanan)->first();

        return view('public.checkout.ubahdata', compact('pesanan', 'pesanan_detail', 'users'));
    }
}
