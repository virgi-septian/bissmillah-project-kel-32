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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_passiens', 30);
            $table->string('telp_pasiens', 12);
            $table->text('alamat_pasiens')->nullable();
            $table->string('resep', 15);
            $table->string('pengirim', 30);
            $table->unsignedBigInteger('id_kasir');
            $table->foreign('id_kasir')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pasiens');
    }
};
