<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
     public function index()
    {
        $users = UsersModel::select('*')
            ->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function tambahusers()
    {
        $users = UsersModel::select('*')
            ->get();
        return view('admin.users.tambahusers', ['users' => $users]);
    }

    public function simpanusers(Request $request)
    {
        // dd($request);
        $users = UsersModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
        ]);
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect()->route('index', ['users' => $users]);
    }

    public function hapususers($id)
    {
        $users = UsersModel::where('id', $id)
            ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');
        return redirect()->route('index');
    }

    public function ubahusers($id)
    {
        $users = UsersModel::select('*')
            ->where('id', $id)
            ->get();

        return view('admin.users.ubahusers', ['users' => $users]);
    }

    public function updateusers(Request $request)
    {
        $users = UsersModel::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'role' => $request->role
            ]);
        Alert::success('Success', 'Data Berhasil Diubah');
        return redirect()->route('index', ['users' => $users]);
    }

    // public function cetakusers()
    // {
    //     $users = UsersModel::select('*')
    //             ->get();
        
    //     $pdf = PDF::loadView('Users.laporan',['users'=>$users]);
    //     return $pdf->stream('Laporan-Data-Users.pdf');
    // }
}
