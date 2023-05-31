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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('faktur', 12);
            $table->decimal('harga', 9, 2)->nullable();
            $table->string('item', 30);
            $table->integer('qyt_beli')->nullable();
            $table->decimal('total_kotor', 9, 2)->nullable();
            $table->decimal('diskon_bayar', 9, 2)->nullable();
            $table->decimal('total_bersih', 9, 2)->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('kembali_bayar', 9, 2)->nullable();
            $table->string('keterangan_beli', 255);
            $table->decimal('pajak_beli', 9, 2)->nullable();
            $table->unsignedBigInteger('id_kasir');
            $table->foreign('id_kasir')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_supp');
            $table->foreign('id_supp')->references('id')->on('suppliers')->onDelete('cascade');
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
};
