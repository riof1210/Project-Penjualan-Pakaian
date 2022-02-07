<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_barang', 'deskripsi', 'gambar'];

    protected $visible = ['kategori_barang', 'deskripsi', 'gambar'];


    public $timestamps = true;

    public function pakaian(){

        return $this->hasMany('App\Models\Pakaian', 'kategori_id');
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/kategoris/' . $this->gambar))) {
            return asset('images/kategoris/' . $this->gambar);
        } else {
            return asset('images/no_image.jpg');
        }
    }


    public function deleteImage(){
        if ($this->gambar && file_exists(public_path('images/kategoris/' . $this->gambar))){
            return unlink(public_path('images/kategoris/' . $this->gambar));
        }
    }
}
