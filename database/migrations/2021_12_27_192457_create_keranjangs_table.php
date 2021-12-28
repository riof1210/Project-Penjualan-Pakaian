<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('pakaian_id')->unsigned();
            $table->integer('qty');
            $table->integer('total_harga');

            $table->foreign('pelanggan_id')->references('id')
            ->on('pelanggans')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('pakaian_id')->references('id')
            ->on('pakaians')->onUpdate('cascade')
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
        Schema::dropIfExists('keranjangs');
    }
}
