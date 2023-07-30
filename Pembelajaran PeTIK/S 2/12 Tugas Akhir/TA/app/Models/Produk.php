<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    //tambahkan kode untuk mapping ke tabel produk
    protected $table = 'produk';
}
