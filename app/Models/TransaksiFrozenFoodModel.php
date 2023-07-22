<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiFrozenFoodModel extends Model
{
    use HasFactory;
    protected $table ='transaksi_frozen_food';
    protected $primaryKey = 'id_transaksi_frozen_food';
    protected $fillable = ['nama_makanan','harga','jumlah','total'];
}
