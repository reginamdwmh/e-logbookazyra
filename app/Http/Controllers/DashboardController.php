<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\DashboardModel;
use App\Models\PesananModel;
use App\Models\PesananDetailModel;
use Illuminate\Http\Request;
use PhpParser\Node\NullableType;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MasterDataMakananModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = UsersModel::select('*')
            ->get();
        return view('Dashboard.index', ['users' => $users]);
    }

    public function admin()
    {
        $users = UsersModel::select('*')
            ->get();
        return view('admin.index', ['users' => $users]);
    }

    public function public()
    {
        $users = UsersModel::select('*')
            ->get();
        $makanan = MasterDataMakananModel::select('*')
            ->get();
        return view('public.index', ['users' => $users, 'makanan' => $makanan]);
    }

    public function makanan_minuman()
    {
        $users = UsersModel::select('*')
            ->get();
        $makanan = MasterDataMakananModel::select('*')
            ->where('nama_kategori', '<>', 'Frozen Food')->get();
        return view('public.index', ['users' => $users, 'makanan' => $makanan]);
    }

    public function frozen_food()
    {
        $users = UsersModel::select('*')
            ->get();
        $makanan = MasterDataMakananModel::select('*')
            ->where('nama_kategori', '=', 'Frozen Food')->get();
        return view('public.index', ['users' => $users, 'makanan' => $makanan]);
    }

    public function indexpenjualansaya()
    {
        $users = UsersModel::select('*')
            ->get();
        $data_penjualan_detail = PesananDetailModel::select('*')->get();
        $data_penjualan = PesananModel::join('users', 'users.id', 'pesanan.user_id')->select('pesanan.*', 'users.*')->where('status', '1')->orderBy('pesanan.created_at', 'DESC')->get();

        // dd($data_penjualan);
        return view('PenjualanSaya.index', ['users' => $users, 'data_penjualan' => $data_penjualan, 'data_penjualan_detail' => $data_penjualan_detail]);
    }

    public function detail($id_pesanan)
    {
        $users = UsersModel::select('*')
            ->get();
        $data_penjualan_detail = PesananDetailModel::join('makanan', 'makanan.id_makanan', 'pesanan_detail.id_item')->select('pesanan_detail.*', 'makanan.nama_makanan')->where('id_pesanan', $id_pesanan)->get();
        $data_penjualan = PesananModel::where('id_pesanan', $id_pesanan)->first();
        // dd($data_penjualan_detail);
        return view('PenjualanSaya.detail', ['users' => $users, 'data_penjualan' => $data_penjualan, 'data_penjualan_detail' => $data_penjualan_detail]);
    }

    public function konfirmasi($id_pesanan)
    {
        $users = UsersModel::select('*')
            ->get();

        $pesanan = PesananModel::where([['id_pesanan', $id_pesanan], ['status', 1]])->first();
        $pesanan->status = 2;
        $pesanan->update();

        Alert::success('Success', 'Data Berhasil di Konfirmasi');
        return redirect()->route('indexpenjualansaya', ['users' => $users]);
        // dd($pesanan);
    }

    public function batal($id_pesanan, Request $request)
    {
        // dd($request);
        $users = UsersModel::select('*')
            ->get();

        $pesanan = PesananModel::where([['id_pesanan', $id_pesanan], ['status', 1]])->first();
        $pesanan_detail = PesananDetailModel::where('id_pesanan', $pesanan->id_pesanan)->get();
        $pesanan->catatan = $request->catatan;
        $pesanan->status = 3;
        $pesanan->update();


        foreach ($pesanan_detail as $value) {
            $makanan = MasterDataMakananModel::where('id_makanan', $value->id_item)->first();

            $stok = 0;
            if ($value->id_item == $makanan->id_makanan) {
                if (!empty($makanan->id_alat)) {
                    $datastok = MasterDataMakananModel::join('stok_alat', 'stok_alat.id_alat', '=', 'makanan.id_alat')->where('id_makanan', $value->id_item)->select('stok_alat.stok_masuk', 'stok_alat.stok_keluar')->first();
                    $stok = $datastok->stok_masuk - $datastok->stok_keluar;

                    ##potong stok
                    $stok = DB::table('stok_alat')->where('id_alat', $makanan->id_alat)->first();
                    $sisa = $stok->stok_masuk - $stok->stok_keluar;
                    if ($sisa > 0) {
                        $stok_keluar = $stok->stok_keluar - $value->jumlah;
                        DB::table('stok_alat')->where('id_alat', $makanan->id_alat)->update(['stok_keluar' => $stok_keluar]);
                    } else {
                        Alert::error('Error', 'Stok Habis');
                        return redirect()->back()->with(['users' => $users]);
                    }
                } else {
                    $datastok = MasterDataMakananModel::join('stok_frozen_food', 'stok_frozen_food.id_makanan', '=', 'makanan.id_makanan')->select('stok_frozen_food.stok_masuk', 'stok_frozen_food.stok_keluar')->where('stok_frozen_food.id_makanan', $value->id_item)->first();
                    $stok = $datastok->stok_masuk - $datastok->stok_keluar;

                    ##potong stok
                    $stok = DB::table('stok_frozen_food')->where('id_makanan', $makanan->id_makanan)->first();
                    $sisa = $stok->stok_masuk - $stok->stok_keluar;
                    if ($sisa > 0) {
                        $stok_keluar = $stok->stok_keluar - $value->jumlah;
                        DB::table('stok_frozen_food')->where('id_makanan', $makanan->id_makanan)->update(['stok_keluar' => $stok_keluar]);
                    } else {
                        Alert::error('Error', 'Stok Habis');
                        return redirect()->back()->with(['users' => $users]);
                    }
                }
            }
        }

        Alert::success('Success', 'Data di Batalkan');
        return redirect()->route('indexpenjualansaya', ['users' => $users]);
    }

    // public function ubahprofile($id)
    // {
    //     $users = UsersModel::select('*')
    //             ->where('id',$id)
    //             ->get();

    //     return view ('Dashboard.editprofile', ['users' => $users]);
    // }


    // public function updateprofile(Request $request)
    // {
    //     $users = UsersModel::where('id', $request->id)
    //     ->update([
    //        'name' => $request->name,
    //        'email' => $request->email,
    //        'password' => bcrypt($request->password),
    //     ]);

    //     Alert::success('Success', 'Data Berhasil Diubah');
    //     return redirect()->route('index',['users' => $users]);
    // }

    // public function profile($id)
    // {
    //     $users = UsersModel::select('*')
    //             ->where('id',$id)
    //             ->get();

    //     return view ('Dashboard.profile', ['users' => $users]);
    // }


}
