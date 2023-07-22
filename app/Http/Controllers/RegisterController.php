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
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        Alert::success('Register Berhasil', 'Silahkan Login');
        return view ('Login.index', ['users' => $users]);
    }
 
}
