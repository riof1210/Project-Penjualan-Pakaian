<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = ['pakaian_id', 'tgl_stok', 'qty_stok'];

    protected $visible = ['pakaian_id', 'tgl_stok', 'qty_stok'];


    public $timestamps = true;

    public function pakaian(){

        return $this->belongsTo('App\Models\Pakaian', 'pakaian_id');
    }
}
