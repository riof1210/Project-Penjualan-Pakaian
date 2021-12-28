<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('penjualan');
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penjualan = Penjualan::all();
        return view('admin.pembayaran.create', compact('penjualan'));
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
            'penjualan_id' => 'required',
            'tgl_bayar' => 'required',
            'total' => 'required',
            'metode' => 'required',
        ]);

        $pembayaran = new Pembayaran;
        $pembayaran->penjualan_id = $request->penjualan_id;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->metode = $request->metode;
        $pembayaran->save();
        return redirect()->route('pembayarans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $penjualan = Penjualan::all();
        return view('admin.pembayaran.edit', compact('pembayaran', 'penjualan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'tgl_bayar' => 'required',
            'total' => 'required',
            'metode' => 'required',
            'penjualan_id' => 'required',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->metode = $request->metode;
        $pembayaran->penjualan_id = $request->penjualan_id;
        $pembayaran->save();
        return redirect()->route('pembayarans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayarans.index');
    }
}
