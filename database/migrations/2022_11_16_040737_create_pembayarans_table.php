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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nota_faktur', 12);
            $table->decimal('total', 9, 2)->nullable();
            $table->decimal('diskon_bayar', 9, 2)->nullable();
            $table->decimal('pajak_bayar', 9, 2)->nullable();
            $table->decimal('dibayars', 9, 2)->nullable();
            $table->decimal('kembali_bayar', 9, 2)->nullable();
            $table->string('status_bayar', 8);
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
        Schema::dropIfExists('pembayarans');
    }
};
