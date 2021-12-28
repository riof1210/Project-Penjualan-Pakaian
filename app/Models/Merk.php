<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $fillable = ['merk_barang'];

    protected $visible = ['merk_barang'];


    public $timestamps = true;

    public function pakaian(){

        return $this->hasMany('App\Models\Pakaian', 'merk_id');
    }
}
