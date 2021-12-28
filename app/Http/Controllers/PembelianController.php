<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::with('pelanggan', 'keranjang');
        return view('admin.pembelian.index', compact('pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $keranjang = Keranjang::all();
        return view('admin.pembelian.create', compact('pelanggan', 'keranjang'));
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
            'keranjang_id' => 'required',
            'tgl_pembelian' => 'required',
            'total_pembelian' => 'required',
        ]);

        $pembelian = new Pembelian;
        $pembelian->pelanggan_id = $request->pelanggan_id;
        $pembelian->keranjang_id = $request->keranjang_id;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->total_pembelian = $request->total_pembelian;
        $pembelian->save();
        return redirect()->route('pembelians.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('admin.pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $keranjang = Keranjang::all();
        return view('admin.pembelian.edit', compact('pembelian', 'pelanggan', 'keranjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required',
            'keranjang_id' => 'required',
            'tgl_pembelian' => 'required',
            'total_pembelian' => 'required',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->pelanggan_id = $request->pelanggan_id;
        $pembelian->keranjang_id = $request->keranjang_id;
        $pembelian->tgl_pembelian = $request->tgl_pembelian;
        $pembelian->total_pembelian = $request->total_pembelian;
        $pembelian->save();
        return redirect()->route('pembelians.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelians.index');
    }
}
