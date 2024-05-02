<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = ['nama_menu', 'harga', 'image', 'deskripsi', 'jenis_id', 'created_at'];



    public function jenis()
    {
        return $this->belongsTo(jenis::class, 'jenis_id');
    }
    public function stok()
    {
        return $this->belongsTo(stok::class, 'id', 'menu_id');
    }
}
