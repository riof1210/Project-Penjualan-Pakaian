<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
        $rules = [
            'kategori_barang' => 'required|max:255|unique:kategoris',
            'deskripsi' => 'required|max:700|unique:kategoris'
        ];

$message = [
            'kategori_barang.required' => 'Kategori harus di isi',
            'kategori_barang.unique' => 'Kategori sudah digunakan',
            'kategori_barang.max' => 'Kategori maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.unique' => 'Deskripsi sudah digunakan',
            'deskripsi.max' => 'Deskripsi maksimal 700 karakter',
        ];

 $validation = Validator::make($request->all(), $rules, $message);
    if ($validation->fails()) {
        Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
        return back()->withErrors($validation)->withInput();
    }

        $kategori = new Kategori;
        $kategori->kategori_barang = $request->kategori_barang;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'kategori_barang' => 'required|max:255|unique:kategoris',
            'deskripsi' => 'required|max:700|unique:kategoris'
        ];

$message = [
            'kategori_barang.required' => 'Kategori harus di isi',
            'kategori_barang.unique' => 'Kategori sudah digunakan',
            'kategori_barang.max' => 'Kategori maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.unique' => 'Deskripsi sudah digunakan',
            'deskripsi.max' => 'Deskripsi maksimal 700 karakter',
        ];

 $validation = Validator::make($request->all(), $rules, $message);
    if ($validation->fails()) {
        Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
        return back()->withErrors($validation)->withInput();
    }

        $kategori = Kategori::findOrFail($id);
        $kategori->kategori_barang = $request->kategori_barang;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
