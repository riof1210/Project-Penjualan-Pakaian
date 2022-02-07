<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        $pakaian_id = $request->input('pakaian_id');
        $qty = $request->input('qty');

        if(Auth::check()){
            $check = Pakaian::where('id', $pakaian_id)->first();
            if($check){
                if(Keranjang::where('pakaian_id', $pakaian_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $check->nama_pakaian . "Alredy Added to cart"]);

                } else{

                    $cartItem = new Keranjang();
                    $cartItem->pakaian_id = $pakaian_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->qty = $qty;
                    $cartItem->save();
                    return response()->json(['status' => $check->nama_pakaian . "Added to cart"]);
                }
            }
        } else{
            return response()->json(['status' => "Login Untuk Melanjutkan"]);
        }
    }

    
}
