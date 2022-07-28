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
        Schema::create('riwayat_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('riwayat_pemesanan');
            $table->unsignedBigInteger('id_checkouts');
            $table->unsignedBigInteger('id_detail_pesanans');
            $table->foreign('id_checkouts')->references('id')->on('checkouts')->onDelete('cascade');
            $table->foreign('id_detail_pesanans')->references('id')->on('detail_pesanans')->onDelete('cascade');

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
        Schema::dropIfExists('riwayat_pemesanans');
    }
};