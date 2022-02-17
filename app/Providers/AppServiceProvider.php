<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Hash;
use Validator;
use DB;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.frontend.nav', function ($view) {
            if (Auth::guest()) {
            } else {
                $cart = DB::table('keranjangs')
                ->join('pakaians', 'pakaians.id', '=', 'keranjnags.pakaian_id')
                ->join('users', 'keranjangs.user_id', '=', 'users.id')
                ->select('keranjangs.*', 'pakaians.nama_pakaian as nama_pakaian', 'pakaians.harga', 'pakaians.gambar')
                ->where('user_id', Auth::user()->id)
                ->get();
                // dd($cart);
                $view->with(compact('cart'));
            }
        });
    }
}
