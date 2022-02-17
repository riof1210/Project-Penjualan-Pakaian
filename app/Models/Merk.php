<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class Merk extends Model
{
    use HasFactory;

    protected $fillable = ['merk_barang'];

    protected $visible = ['merk_barang'];


    public $timestamps = true;

    public function pakaian(){

        return $this->hasMany('App\Models\Pakaian', 'merk_id');
    }

    public static function boot(){
        parent::boot();
        self::deleting(function($merk){
            //mengecek apakah penulis masih punya buku
            if ($merk->pakaian->count() > 0){
                //menyiapkan pesan error
                Alert::error('Failed', 'Data not deleted because merk still have data pakaian');
                return false;
            }
        });
    }
}
