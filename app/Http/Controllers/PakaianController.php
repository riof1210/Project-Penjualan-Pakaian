<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pakaian;
use Illuminate\Http\Request;

class PakaianController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakaians = Pakaian::with('merk', 'kategori', 'supplier');
        return view('admin.pakaian.index', compact('pakaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::all();
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('admin.pakaian.create', compact('merk', 'kategori', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_pakaian' => 'required',
            'merk_id' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|max:2048',
            'deskripsi' => 'required',
            'supplier_id' => 'required',
        ]);

        $pakaian = new Pakaian;
        $pakaian->nama_pakaian = $request->nama_pakaian;
        $pakaian->merk_id = $request->merk_id;
        $pakaian->kategori_id = $request->kategori_id;
        $pakaian->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/pakaians/', $name);
            $pakaian->gambar = $name;
        }
        $pakaian->deskripsi = $request->deskripsi;
        $pakaian->supplier_id = $request->supplier_id;
        $pakaian->save();
        return redirect()->route('pakaians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        return view('admin.pakaian.show', compact('pakaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $merk = Merk::all();
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('admin.pakaian.edit', compact('pakaian', 'merk', 'kategori', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama_pakaian' => 'required',
            'merk_id' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'supplier_id' => 'required',
        ]);

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->nama_pakaian = $request->nama_pakaian;
        $pakaian->merk_id = $request->merk_id;
        $pakaian->kategori_id = $request->kategori_id;
        $pakaian->harga = $request->harga;
        if ($request->hasFile('gambar')){
            $pakaian->deleteImage();
            $image = $request->file('gambar');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/pakaians/', $name);
            $pakaian->gambar = $name;
        }
        $pakaian->deskripsi = $request->deskripsi;
        $pakaian->supplier_id = $request->supplier_id;
        $pakaian->save();
        return redirect()->route('pakaians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $pakaian->delete();
        $pakaian->deleteImage();
        return redirect()->route('pakaians.index');
    }
}
