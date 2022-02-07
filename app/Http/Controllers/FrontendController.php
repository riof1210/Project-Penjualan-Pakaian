<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pakaian;

class FrontendController extends Controller
{
    public function index()
    {
        $pakaians = Pakaian::all();
        return view('frontend.index', compact('pakaians'));
    }

    public function category()
    {
        $kategori = Kategori::all();

        return view('frontend.category', compact('kategori'));
    }

    public function viewcategory($kategori_barang)
    {
        if(Kategori::where('kategori_barang', $kategori_barang)->exists()){
        $kategori = Kategori::where('kategori_barang', $kategori_barang)->first();
        $pakaians = Pakaian::where('kategori_id', $kategori->id)->get();
        return view('frontend.produk.index', compact('kategori', 'pakaians'));

        } else {
            return  redirect('/')->with('kategori_barang', 'Kategori Tidak Ada');
        }

        return view('frontend.category', compact('kategori'));
    }

    public function productview($kategori_barang, $nama_pakaian)
    {
        if(Kategori::where('kategori_barang', $kategori_barang)->exists()){
            if(Pakaian::where('nama_pakaian', $nama_pakaian)->exists()){
                $pakaians = Pakaian::where('nama_pakaian', $nama_pakaian)->first();
                return view('frontend.produk.view', compact('pakaians'));
            }
            else{
                return redirect('/')->with('status', "Maaf Tidak Ada");
            }

        } else {
            return  redirect('/')->with('status', 'Kategori Tidak Ada');
        }

        
    }

}
