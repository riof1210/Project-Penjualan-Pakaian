<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = ['pelanggan_id', 'pakaian_id', 'qty', 'total_harga'];

    protected $visible = ['pelanggan_id', 'pakaian_id', 'qty', 'total_harga'];


    public $timestamps = true;

    public function pembelian(){

        return $this->hasMany('App\Models\Pembelian', 'keranjang_id');
    }
    public function pelanggan(){

        return $this->belongsTo('App\Models\Pelanggan', 'pelanggan_id');
    }
    public function pakaian(){

        return $this->belongsToMany('App\Models\Pakaian', 'pakaian_id');
    }
}
