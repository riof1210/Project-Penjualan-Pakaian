<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class ApiController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return response()->json([
                'succes' => true,
                'message' => 'List Data Kategori',
                'data' => $kategori
        ], 200);
    }

    public function create(){

    }

    public function store(Request $request){
        $validated = $request->validate([
            'kategori_barang' => 'required',
        ]);

        $kategori = new Kategori;
        $kategori->kategori_barang = $request->kategori_barang;
        $kategori->save();
        return response()->json([
            'succes' => true,
            'message' => 'Tambah Kategori',
            'data' => $kategori
        ], 200);
    }

    public function show($id){
        $kategori = Kategori::find($id);
        return response()->json([
                'succes' => true,
                'message' => 'List Data Kategori',
                'data' => $kategori
        ], 200);
    }

    public function edit($id){

    }

    public function update(Request $request,$id)
    {
        // $validated = $request->validate([
        //     'kategori_barang' => 'required',
        // ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->kategori_barang = $request->kategori_barang;
        $kategori->save();
        return response()->json([
            'succes' => true,
            'message' => 'Data Kategori Berhasil Diedit',
            'data' => $kategori
        ], 200);
    }
}
