<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_bayar', 'total', 'metode', 'pembelian_id'];

    protected $visible = ['tgl_bayar', 'total', 'metode', 'pembelian_id'];


    public $timestamps = true;

    public function pembelian(){

        return $this->belongsToMany('App\Models\Peembelian', 'pembelian_id');
    }
}
