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

    // public static function boot(){
    //     parent::boot();
    //     self::deleting(function($merk){
    //         //mengecek apakah penulis masih punya buku
    //         if ($merk->pakaians->count() > 0){
    //             //menyiapkan pesan error
    //             $html = 'Merk tidak bisa dihapus karena masih memiliki data pakaian : ';
    //             $html = '<ul>';
    //                 foreach($author->pakaians as $pakaian){
    //                     $html .= "<li>$pakaian->nama</li>";
    //                 }
    //             $html .= '</ul>';
    //             Session::flash("flash_notification", [
    //                 "level" => "danger",
    //                 "message" => $html
    //             ]);
    //             //membatalkan proses penghapusan
    //             return false;
    //         }
    //     });
    // }
}
