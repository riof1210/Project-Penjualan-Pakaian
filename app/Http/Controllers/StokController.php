<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok::with('pakaian')->get();
        return view('admin.stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakaian = Pakaian::all();
        return view('admin.stok.create', compact('pakaian'));
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
            'pakaian_id' => 'required',
            'tgl_stok' => 'required',
            'qty_stok' => 'required',
        ]);

        $stok = new Stok;
        $stok->pakaian_id = $request->pakaian_id;
        $stok->tgl_stok = $request->tgl_stok;
        $stok->qty_stok = $request->qty_stok;
        $stok->save();
        return redirect()->route('stok.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stok = Stok::findOrFail($id);
        return view('admin.stok.show', compact('stok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = stok::findOrFail($id);
        $pakaian = Pakaian::all();
        return view('admin.stok.edit', compact('stok', 'pakaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'pakaian_id' => 'required',
            'tgl_stok' => 'required',
            'qty_stok' => 'required',
        ]);

        $stok = Stok::findOrFail($id);
        $stok->pakaian_id = $request->pakaian_id;
        $stok->tgl_stok = $request->tgl_stok;
        $stok->qty_stok = $request->qty_stok;
        $stok->save();
        return redirect()->route('stok.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();
        return redirect()->route('stok.index');
    }
}
