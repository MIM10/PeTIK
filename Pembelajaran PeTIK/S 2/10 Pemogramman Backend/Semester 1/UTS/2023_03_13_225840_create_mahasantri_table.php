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
        Schema::create('mahasantri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nim');
            $table->string('nama',50);
            $table->string('jurusan',50);
            $table->text('alamat');
            $table->string('kota',50);
            $table->string('provinsi',50);
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasantri');
    }
};
