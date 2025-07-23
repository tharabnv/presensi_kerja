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
        Schema::create('pekerjas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // ganti dari 'nama_pekerja' ke 'nama'
            $table->string('nomor_pekerja')->unique();
            $table->string('divisi');
            $table->string('email')->unique()->nullable(); // untuk relasi ke user atau identifikasi login
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjas');
    }
};
