<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Session;
use Alert;
use Validator;

class MerkController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        return view('admin.merk.index', compact('merk'));
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
        $rules = [
            'merk_barang' => 'required|max:255|unique:merks',

        ];

        $message = [
            'merk_barang.required' => 'Merk harus di isi',
            'merk_barang.unique' => 'Merk sudah ada',
            'merk_barang.max' => 'Merk maksimal 255 karakter',

        ];

        $validation = Validator::make($request->all(), $rules, $message);
            if ($validation->fails()) {
                Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
                return back()->withErrors($validation)->withInput();
            }

        $merk = new Merk;
        $merk->merk_barang = $request->merk_barang;
        $merk->save();
        return redirect()->route('merk.index');

        // $this->validate($request, ['merk_barang' => 'required|unique:merk']);
        //     $merk = Merk::create($request->only('merk_barang'));

            // Session::flash("flash_notification", [
            //     "level" => "success",
            //     "message" => "Berhasil Menyimpan $merk->merk_barang"
            // ]);
            // return redirect()->route('merk.index');
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
        $rules = [
            'merk_barang' => 'required|max:255|unique:merks',
        ];

        $message = [
            'merk_barang.required' => 'Merk harus di isi',
            'merk_barang.unique' => 'Merk sudah digunakan',
            'merk_barang.max' => 'Merk maksimal 255 karakter',

        ];

        $validation = Validator::make($request->all(), $rules, $message);
            if ($validation->fails()) {
                Alert::error('Oops', 'Data yang anda input tidak valid, silahkan di ulang')->autoclose(2000);
                return back()->withErrors($validation)->withInput();
            }

        $merk = Merk::findOrFail($id);
        $merk->merk_barang = $request->merk_barang;
        $merk->save();
        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $merk = Merk::findOrFail($id);
        // $merk->delete();
        // return redirect()->route('merk.index');

        if(!Merk::destroy($id)){
            return redirect()->back();

        }
        Alert::success('Good Job', 'Data deleted successfully');
        return redirect()->route('merk.index');
    }
}
