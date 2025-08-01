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
        Schema::table('pekerjas', function (Blueprint $table) {
            $table->string('email')->after('nomor_pekerja'); // tambahkan kolom email
        });
    }

    public function down(): void
    {
        Schema::table('pekerjas', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }

};
