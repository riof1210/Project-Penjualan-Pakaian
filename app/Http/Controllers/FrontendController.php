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
        return view('layouts.frontend', compact('pakaians'));
    }

    public function show($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        return view('frontend.detailbarang', compact('pakaian'));
    }
}
