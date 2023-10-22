<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function simpanregis(Request $request)
    {
        $users = UsersModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->nohp,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        Alert::success('Register Berhasil', 'Silahkan Login');
        return view('Login.index', ['users' => $users]);
    }

    // public function simpandetail(Request $request)
    // {
    //     // dd($request);
    //     $users = UsersModel::where('id', $request->id_user)
    //         ->update([
    //             'alamat' => $request->alamat
    //         ]);
    //     Alert::success('Register Berhasil', 'Silahkan Login');
    //     // return redirect()->route('Login.index', ['users' => $users]);
    //     return view ('Login.index');
    // }
}
