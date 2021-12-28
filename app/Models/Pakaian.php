<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakaian extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pakaian', 'merk_id', 'jenis_id', 'harga', 'gambar', 'deskripsi', 'supplier_id'];

    protected $visible = ['nama_pakaian', 'merk_id', 'jenis_id', 'harga', 'gambar', 'deskripsi', 'supplier_id'];


    public $timestamps = true;

    public function merk(){

        return $this->belogsToMany('App\Models\Merk', 'merk_id');
    }
    public function kategori(){

        return $this->belogsToMany('App\Models\Kategori', 'kategori_id');
    }
    public function supplier(){

        return $this->belogsToMany('App\Models\Supplier', 'supplier_id');
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
