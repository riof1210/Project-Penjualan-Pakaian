<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pakaians = DB::table('pakaians')->count();
        $kategori = DB::table('kategoris')->count();
        $merk = DB::table('merks')->count();
        $supplier = DB::table('suppliers')->count();
        return view('admin.index', compact('pakaians', 'kategori', 'merk', 'supplier'));
    }
}
