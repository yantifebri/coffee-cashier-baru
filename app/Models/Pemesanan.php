<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['tanggal_pemesanan', 'jam_mulai', 'jam_selesai', 'nama_pemesan','jumlah_pelanggan'];
}
