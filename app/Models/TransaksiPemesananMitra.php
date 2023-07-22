<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemesananMitra extends Model
{
    use HasFactory;
    protected $table ='transaksi_pemesanan_mitra';
    protected $primaryKey = 'id_mitra';
    protected $fillable = ['kode_pemesanan','keterangan_pemesanan','jumlah','biaya_admin','ongkir','komisi','total'];
}
