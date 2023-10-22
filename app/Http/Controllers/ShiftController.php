<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftModel;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\NullableType;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\UsersModel;

class ShiftController extends Controller
{
    private function ClearChr($param)
    {
        return $result = str_replace(array('\'', '"', ',', ';', '<', '>', '_', '-', ' ', '.', '!', '?', '/', '=', '+', ']', '[', '{', '}', '@', '#', '$', '%', '^', '&', "*", '(', ')'), '', $param);
    }

    public function simpanshift(Request $request)
    {
        // dd($request);
        if ($request->status == 1) {
            $users = UsersModel::select('*')
                ->get();
            $date_now = date('Ymd');
            $date_minaday = date('Ymd');
            $kas = ShiftModel::where(DB::raw("DATE_FORMAT(created_at, '%Y%m%d')"), $date_now)
                ->where('id_user', Auth::user()->id)
                ->first();
            $kas_old = ShiftModel::where(DB::raw("DATE_FORMAT(created_at, '%Y%m%d')"), $date_minaday)
                ->where('kode_status', 2)
                ->orderBy('updated_at', 'desc')
                ->first();
            if (empty($kas)) {
                $shift = new ShiftModel();
                $shift->id_user = Auth::user()->id;
                $shift->kas = $kas_old->kas + $kas_old->kas_update;
                $shift->kode_status = $request->status;
                $shift->save();
                Alert::success('Success', 'Data Berhasil Disimpan');
                return redirect()->back()->with(['users' => $users]);
            }
        } else {
            $users = UsersModel::select('*')
                ->get();

            $shift = new ShiftModel();
            $shift->id_user = Auth::user()->id;
            $shift->kas = $this->ClearChr(substr($request->kas, 4));
            $shift->kode_status = $request->status;
            $shift->save();
            Alert::success('Success', 'Data Berhasil Disimpan');
            return redirect()->back()->with(['users' => $users]);
        }
        // dd($this->ClearChr(substr($request->kas, 4)));
    }
}
