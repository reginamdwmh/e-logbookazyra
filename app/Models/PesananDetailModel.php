<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetailModel extends Model
{
    use HasFactory;
    protected $table = 'pesanan_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id_item', 'id_pesanan', 'jumlah', 'harga_satuan', 'catatan', 'subtotal'];


    public function get_pesanan()
    {
        return $this->belongsTo(PesananModel::class, 'id_pesanan');
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
