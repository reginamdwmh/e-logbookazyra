<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;
    protected $table ='pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['user_id','tanggal','status','total', 'catatan'];


    public function get_pesanandetail(){  
        return $this->hasMany(PesananDetailModel::class, 'id_pesanan');  
    } 

    // public function transaksidetailumum()
    // {
    //     return $this->belongsToMany(MasterDataMakananModel::class)->withPivot('
    //     keterangan_pemmesanan','jumlah_pemesanan');
    // }

    // public function pemesanans()
    // {
    //     return $this->hasMany(MasterDataPemesananModel::class);
    // }

}