<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MasterDataMakananModel;
use App\Models\UsersModel;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role === 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role === 'user') {
                return redirect()->intended('user');
            } elseif ($user->role === 'public') {
                return redirect()->intended('public');
            }
        }

        return view('Login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            // $periode = date('Ym');
            // $cekstok = DB::table('stok_alat')->select('*')->where('periode', array($periode))->get();
            // // dd($cekstok);
            // $periodelama = date('Ym', strtotime('-1month'));
            // $databulanlalu = DB::table('stok_alat')->select('*')->where('periode', array($periodelama))->get();

            $user = Auth::user();
            Alert::success('Login Berhasil');

            // if (count($cekstok) == 0) {
            //     foreach ($databulanlalu as $value) {
            //         DB::table('stok_alat')->insert([
            //             [
            //                 'periode' => $periode,
            //                 'id_alat' => $value->id_alat,
            //                 'stok_awal' => $value->stok_masuk - $value->stok_keluar,
            //                 'stok_masuk' => 0,
            //                 'stok_keluar' => 0,
            //                 'created_at' => date('Y-m-d H:i:s'),
            //                 'updated_at' => date('Y-m-d H:i:s')
            //             ]
            //         ]);
            //     }
            // }

            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->role === 'user') {
                return redirect()->intended('/dashboard');
            } elseif ($user->role === 'public') {
                // return redirect()->intended('/public');
                $users = UsersModel::select('*')
                    ->get();
                $makanan = MasterDataMakananModel::select('*')
                    ->get();
                $query_stok = "SELECT
        m.id_makanan,
        COALESCE(m.id_alat,'') id_alat,
        CASE WHEN sa.stok_masuk IS NOT NULL THEN sa.stok_masuk - sa.stok_keluar ELSE sff.stok_masuk - sff.stok_keluar END AS stok
        FROM makanan m
        LEFT JOIN stok_alat sa ON sa.id_alat = m.id_alat
        LEFT JOIN stok_frozen_food sff ON sff.id_makanan = m.id_makanan";
                $stok = DB::select($query_stok);
                return view('public.index', ['makanan' => $makanan, 'users' => $users, 'stok' => $stok]);
            }
        }

        // if(Auth::attempt($credentials)) {
        //     Alert::success('Login Berhasil');
        //     $request->session()->regenerate();         
        //     return redirect()->intended('/dashboard');

        // }

        Alert::error('Error', 'Login Gagal');
        return back();
    }

    public function logout(Request $request)
    {

        $request->session()->flush();
        Auth::logout();
        Alert::success('Success', 'Anda Berhasil Logout');
        $makanan = MasterDataMakananModel::select('*')
            ->get();
        $query_stok = "SELECT
        m.id_makanan,
        COALESCE(m.id_alat,'') id_alat,
        CASE WHEN sa.stok_masuk IS NOT NULL THEN sa.stok_masuk - sa.stok_keluar ELSE sff.stok_masuk - sff.stok_keluar END AS stok
        FROM makanan m
        LEFT JOIN stok_alat sa ON sa.id_alat = m.id_alat
        LEFT JOIN stok_frozen_food sff ON sff.id_makanan = m.id_makanan";
        $stok = DB::select($query_stok);
        return view('public.index', ['makanan' => $makanan, 'stok' => $stok]);
        // return redirect('/login');
    }
}
