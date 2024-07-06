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
        Schema::table('pesanans', function (Blueprint $table) {
            $table->string('lokasi_penjemputan')->nullable();
            $table->time('waktu_penjemputan')->nullable();
            $table->text('kebutuhan_khusus')->nullable();
            $table->string('kontak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropColumn('lokasi_penjemputan');
            $table->dropColumn('waktu_penjemputan');
            $table->dropColumn('kebutuhan_khusus');
            $table->dropColumn('kontak');
        });
    }
};