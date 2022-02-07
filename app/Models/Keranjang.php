<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pakaian_id', 'qty'];

    protected $visible = ['user_id', 'pakaian_id', 'qty'];


    public $timestamps = true;

    public function pembelian(){

        return $this->hasMany('App\Models\Pembelian', 'keranjang_id');
    }
    public function user(){

        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function pakaian(){

        return $this->belongsToMany('App\Models\Pakaian', 'pakaian_id');
    }
}
