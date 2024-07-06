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
        Schema::create('tempat_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat', 200);
            $table->string('kategori');
            $table->integer('daya_tampung');
            $table->string('fasilitas');
            $table->String('gambar');
            $table->text('lokasi');
            $table->text('deskripsi');
            $table->integer('rating')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_wisatas');
    }
};