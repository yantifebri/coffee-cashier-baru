<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama', 'email', 'nomor_telepon', 'alamat'];
}
