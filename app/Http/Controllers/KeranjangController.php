<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Keranjang;
use Alert;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahKeranjang(Request $request)
    {
        if (Auth::guest()) {
            Alert::warning('Please login first to add to the basket', 'Sorry');
            return redirect()->back();
        } elseif (Auth::check()) {
            $id = $request->get('id');
            $qty = $request->get('qty');
            $count = Keranjang::where('pakaian_id', '=', $id)->where('user_id', '=', Auth::user()->id)->count();
            if ($count) {
                Alert::warning('The product already in your cart', 'Sorry');
                return redirect()->back();
            }
            $keranjang = new Keranjang;
            $keranjang->user_id = Auth::user()->id;
            $keranjang->pakaian_id = $id;
            $keranjang->qty = $qty;
            $keranjang->save();
            Alert::success('Data successfully saved to cart', 'Good Job')->autoclose(1500);
            return redirect('cart');
        }
    }
    public function index()
    {
        if (Auth::guest()) {
            Alert::warning('Please login first to see your item in the basket', 'Sorry');
            return redirect()->back();
        } else {
            $keranjang = DB::table('keranjangs')
                ->join('pakaians', 'pakaians.id', '=', 'keranjangs.pakaian_id')
                ->join('users', 'keranjangs.user_id', '=', 'users.id')
                ->select('keranjangs.*', 'pakaians.nama_pakaian as nama_pakaian', 'pakaians.harga', 'pakaians.gambar')
                ->where('user_id', Auth::user()->id)
                ->get();
            // dd($keranjang);

            $price = DB::table('keranjangs')
                ->join('pakaians', 'pakaians.id', '=', 'keranjangs.pakaian_id')
                ->join('users', 'keranjangs.user_id', '=', 'users.id')
                ->select(DB::raw('SUM(pakaians.harga*keranjang.qty) as total'))
                ->where('user_id', Auth::user()->id)
                ->first();
        
            // dd($price);
            return view('frontend.cart.index', compact('keranjang', 'price'));
        }
    }

    public function delete($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        Alert::success('Data successfully deleted', 'Good Job')->autoclose(1500);
        return view('frontend.cart.index', compact('keranjang'));
    }

}
