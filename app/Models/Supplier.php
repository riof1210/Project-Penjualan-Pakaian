<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['nama','alamat','telp'];

    protected $visible = ['nama','alamat','telp'];


    public $timestamps = true;

    public function pakaian(){

        return $this->hasMany('App\Models\Pakaian', 'supplier_id');
    }
}
