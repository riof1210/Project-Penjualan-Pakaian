<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merks = Merk::all();
        return view('admin.merk.index', compact('merks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merk.create');
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
            'merk_barang' => 'required',
        ]);

        $merk = new Merk;
        $merk->merk_barang = $request->merk_barang;
        $merk->save();
        return redirect()->route('merks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.show', compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'merk_barang' => 'required',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->merk_barang = $request->merk_barang;
        $merk->save();
        return redirect()->route('merks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('merks.index');
    }
}
