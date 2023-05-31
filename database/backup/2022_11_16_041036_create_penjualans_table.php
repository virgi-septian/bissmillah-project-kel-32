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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nota', 12);
            $table->char('status', 1)->default('n');
            $table->date('tanggal_jual')->nullable();
            $table->char('status_jual', 1);
            $table->integer('qyt_jual')->nullable();
            $table->decimal('pajak_jual', 9, 2)->nullable();
            $table->decimal('subtotal', 9, 2)->nullable();
            $table->unsignedBigInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
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
        Schema::dropIfExists('penjualans');
    }
};
