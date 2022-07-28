<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('total_harga');
            $table->string('metode_pembayaran');
            $table->string('metode_pengiriman');
            $table->unsignedBigInteger('id_produks');
            $table->unsignedBigInteger('id_profils');
            $table->foreign('id_produks')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('id_profils')->references('id')->on('profils')->onDelete('cascade');
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
        Schema::dropIfExists('checkouts');
    }
};