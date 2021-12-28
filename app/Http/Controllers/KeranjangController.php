<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pakaian;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjangs = Keranjang::with('pelanggan', 'pakaian')->get();
        return view('admin.keranjang.index', compact('keranjangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $pakaian = Pakaian::all();

        return view('admin.keranjang.create', compact('pelanggan', 'pakaian'));
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
            'pelanggan_id' => 'required',
            'pakaian_id' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $keranjang = new Keranjang;
        $keranjang->pelanggan_id = $request->pelanggan_id;
        $keranjang->pakaian_id = $request->pakaian_id;
        $keranjang->qty = $request->qty;
        $keranjang->total_harga = $request->total_harga;
        $keranjang->save();
        return redirect()->route('keranjangs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        return view('admin.keranjang.show', compact('keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $pakaian = Pakaian::all();
        return view('admin.keranjang.edit', compact('keranjang', 'pelanggan', 'pakaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required',
            'pakaian_id' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->pelanggan_id = $request->pelanggan_id;
        $keranjang->pakaian_id = $request->pakaian_id;
        $keranjang->qty = $request->qty;
        $keranjang->total_harga = $request->total_harga;
        $keranjang->save();
        return redirect()->route('keranjangs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return redirect()->route('keranjangs.index');
    }
}
