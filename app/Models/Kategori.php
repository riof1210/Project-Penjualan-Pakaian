<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_barang'];

    protected $visible = ['kategori_barang'];


    public $timestamps = true;

    public function pakaian(){

        return $this->hasMany('App\Models\Pakaian', 'kategori_id');
    }
}
