<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakaians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pakaian');
            $table->bigInteger('merk_id')->unsigned();
            $table->bigInteger('kategori_id')->unsigned();
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->string('deskripsi');
            $table->bigInteger('supplier_id')->unsigned();

            $table->foreign('merk_id')->references('id')
                ->on('merks')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')
                ->on('kategoris')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onUpdate('cascade')
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
        Schema::dropIfExists('pakaians');
    }
}
