<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('keranjang_id')->unsigned();
            $table->datetime('tgl_pembelian');
            $table->integer('total_pembelian');

            $table->foreign('pelanggan_id')->references('id')
            ->on('pelanggans')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('keranjang_id')->references('id')
            ->on('keranjangs')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
