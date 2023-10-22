<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftModel extends Model
{
    use HasFactory;
    protected $table = 'kas';
    protected $primaryKey = 'id_kas';
    protected $fillable = ['id_user', 'kas', 'kas_update', 'kode_status'];
}
