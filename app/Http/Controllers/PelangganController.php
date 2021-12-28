<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::with('user');
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.pelanggan.create', compact('user'));
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
            'user_id' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->user_id = $request->user_id;
        $pelanggan->nama = $request->nama;
        $pelanggan->jk = $request->jk;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telp = $request->telp;
        $pelanggan->save();
        return redirect()->route('pelanggans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $user = User::all();
        return view('admin.pelanggan.edit', compact('pelanggan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->user_id = $request->user_id;
        $pelanggan->nama = $request->nama;
        $pelanggan->jk = $request->jk;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->telp = $request->telp;
        $pelanggan->save();
        return redirect()->route('pelanggans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggans.index');
    }
}
