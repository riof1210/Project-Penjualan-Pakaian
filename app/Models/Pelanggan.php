<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'jk', 'alamat', 'telp'];

    protected $visible = ['user_id', 'nama', 'jk', 'alamat', 'telp'];


    public $timestamps = true;

    
    public function keranjang(){

        return $this->hasMany('App\Models\Keranjang', 'pelanggan_id');
    }

    public function pembelian(){

        return $this->hasMany('App\Models\Pembelian', 'pembelian_id');
    }

    public function pembayaran(){

        return $this->hasMany('App\Models\Pembayaran', 'pembayaran_id');
    }
}
