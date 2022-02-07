<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakaian extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pakaian', 'merk_id', 'kategori_id', 'harga', 'qty', 'gambar', 'deskripsi', 'supplier_id'];

    protected $visible = ['nama_pakaian', 'merk_id', 'kategori_id', 'harga', 'qty', 'gambar', 'deskripsi', 'supplier_id'];


    public $timestamps = true;

    public function stok(){

        return $this->hasOne('App\Models\Stok', 'pakaian_id');
    }
    public function merk(){

        return $this->belongsTo('App\Models\Merk', 'merk_id');
    }
    public function kategori(){

        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }
    public function supplier(){

        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/pakaians/' . $this->gambar))) {
            return asset('images/pakaians/' . $this->gambar);
        } else {
            return asset('images/no_image.jpg');
        }
    }


    public function deleteImage(){
        if ($this->gambar && file_exists(public_path('images/pakaians/' . $this->gambar))){
            return unlink(public_path('images/pakaians/' . $this->gambar));
        }
    }
}
