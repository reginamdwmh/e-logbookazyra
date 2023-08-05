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
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp
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
                $pesanan_detail->user_id = Auth::user()->id;
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

        // dd(count($pesanan_detail));
        $pesanan->total = $pesanan->total - $pesanan_detail->subtotal;
        $pesanan->update();
        $pesanan_detail->delete();

        $cek_pesanandetail = PesananDetailModel::where('id_pesanan', $pesanan->id_pesanan)->get();

        if (count($cek_pesanandetail) < 1) {
            $pesanan->delete();
        }

        Alert::success('Success', 'Data Berhasil Dihapus dari Keranjang');
        return redirect()->back()->with(['users' => $users]);
    }

    public function confirm(Request $request)
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

            if ($request->file('image')) {
                $value->image = $request->file('image')->store('makanan-foto');
            }
            $value->jenis_pembayaran = $request->pembayaran;
            // $value->image = $request->image;
            $value->update();
        }

        Alert::success('Success', 'Berhasil Checkout');
        return redirect()->back()->with(['users' => $users]);
    }

    public function edit_item($id)
    {
        $users = UsersModel::select('*')
            ->get();
        $query = "SELECT
        pd.id,
        pd.id_pesanan,
        m.nama_makanan,
        pd.harga_satuan,
        pd.jumlah,
        pd.subtotal,
        COALESCE(pd.catatan, '') AS catatan,
        m.image,
        k.keterangan_kategori
    FROM
        pesanan_detail pd
        LEFT JOIN makanan m ON m.id_makanan = pd.id_item
        LEFT JOIN kategori k ON k.nama_kategori = m.nama_kategori
    WHERE pd.id = '" . $id . "'
    ORDER BY
        pd.id,
        pd.id_pesanan";

        $pesanan_detail = DB::select($query);
        // dd($pesanan_detail[0]->harga_satuan);

        return view('public.checkout.ubahdata', ['users' => $users, 'pesanan_detail' => $pesanan_detail]);
    }

    public function update_to_cart(Request $request)
    {
        $users = UsersModel::select('*')
            ->get();
        $id_pesanan_detail = PesananDetailModel::where('id', $request->id)->first();

        $stok = 0;
        $makanan = MasterDataMakananModel::where('id_makanan', $id_pesanan_detail->id_item)->first();
        // dd($makanan);
        if (!empty($makanan->id_alat)) {
            $datastok = MasterDataMakananModel::join('stok_alat', 'stok_alat.id_alat', '=', 'makanan.id_alat')->where('id_makanan', $id_pesanan_detail->id_item)->first(['stok_alat.stok_masuk', 'stok_alat.stok_keluar']);
            $stok = $datastok->stok_masuk - $datastok->stok_keluar;
        } else {
            $datastok = MasterDataMakananModel::join('stok_frozen_food', 'stok_frozen_food.id_makanan', '=', 'makanan.id_makanan')->where('stok_frozen_food.id_makanan', $id_pesanan_detail->id_item)->first(['stok_frozen_food.stok_masuk', 'stok_frozen_food.stok_keluar']);
            $stok = $datastok->stok_masuk - $datastok->stok_keluar;
        }

        // $tanggal = Carbon::now();

        if ($request->jumlah_pesanan > $stok) {
            Alert::error('Error', 'Stok Tidak Mencukupi');
            return redirect()->back()->with(['users' => $users]);
        } else {
            $pesanan_detail = PesananDetailModel::where('id', $request->id)->first();

            $pesanan = PesananModel::where('id_pesanan', $pesanan_detail->id_pesanan)->first();

            // $pesanan = PesananModel::where('user_id', Auth::user()->id)->where('status', 0)->first();
            // if ($request->jumlah_pesanan < $pesanan_detail->jumlah) {
            //     $pesanan->total =($pesanan->total - $pesanan_detail->subtotal) - ($request->jumlah_pesanan * $pesanan_detail->harga_satuan);
            //     $pesanan->update();
            // } else {
            $pesanan->total = ($pesanan->total - $pesanan_detail->subtotal) + ($request->jumlah_pesanan * $pesanan_detail->harga_satuan);
            $pesanan->update();
            // }

            $pesanan_detail->jumlah = $request->jumlah_pesanan;
            $pesanan_detail->subtotal = $request->jumlah_pesanan * $pesanan_detail->harga_satuan;
            $pesanan_detail->catatan = $request->catatan;
            $pesanan_detail->update();
        }
        Alert::success('Success', 'Data Berhasil Update Keranjang');
        return redirect()->back()->with(['users' => $users]);
    }

    public function indexhistory()
    {
        $users = UsersModel::select('*')
            ->get();
        // $makanan = MasterDataMakananModel::where('id_makanan', $id_makanan)->first();
        // $makanan = MasterDataMakananModel::join('kategori', 'makanan.nama_kategori', '=', 'kategori.nama_kategori')->where('id_makanan', $id_makanan)->first(['makanan.*', 'kategori.keterangan_kategori']);
        // dd($makanan);
        $pesanan = DB::table('pesanan')->select(DB::raw('SUM(total) AS total'))->where('user_id', Auth::user()->id)->first();
        if (!empty($pesanan)) {
            $pesanan_detail = PesananDetailModel::join('makanan', 'pesanan_detail.id_item', '=', 'makanan.id_makanan')->where('user_id', Auth::user()->id)->get(['pesanan_detail.*', 'makanan.nama_makanan']);
        }

        if (!empty($pesanan)) {
            // dd($total);
            return view('public.history.index', ['users' => $users, 'pesanan' => $pesanan, 'pesanan_detail' => $pesanan_detail]);
        } else {
            return view('public.history.index', compact('users'));
        }
    }
}
