<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataMakananModel;
use App\Models\MasterDataKategoriModel;
use App\Models\UsersModel;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id_makanan)
    {
        $users = UsersModel::select('*')
                ->get();
        $makanan = MasterDataMakananModel::where('id_makanan', $id_makanan)->first();

        return view('public.pesan.index', compact('makanan','users'));
    }
}
