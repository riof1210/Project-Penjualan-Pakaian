<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = ['pelanggan_id', 'keranjang_id', 'tgl_pembelian', 'total_pembelian'];

    protected $visible = ['pelanggan_id', 'keranjang_id', 'tgl_pembelian', 'total_pembelian'];


    public $timestamps = true;

    public function pelanggan(){

        return $this->belongsTo('App\Models\Pelanggan', 'pelanggan_id');
    }

    public function keranjang(){

        return $this->belongsTo('App\Models\Keranjang', 'keranjang_id');
    }
}
