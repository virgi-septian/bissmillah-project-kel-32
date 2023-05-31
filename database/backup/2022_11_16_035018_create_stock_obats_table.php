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
        Schema::create('stock_obats', function (Blueprint $table) {
            $table->id();
            $table->integer('masuk')->nullable();
            $table->integer('keluar')->nullable();
            $table->decimal('beli', 9, 2)->nullable();
            $table->decimal('jual', 9, 2)->nullable();
            $table->date('expired')->nullable();
            $table->decimal('stock', 9, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            $table->unsignedBigInteger('admin');
            $table->foreign('admin')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('stock_obats');
    }
};
