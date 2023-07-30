<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('kegunaan');
            $table->string('harga');
            $table->integer('stok');
            $table->integer('idkategori');
            $table->text('komposisi');
            $table->string('kontra_indikasi');
            $table->string('aturan_pakai');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
