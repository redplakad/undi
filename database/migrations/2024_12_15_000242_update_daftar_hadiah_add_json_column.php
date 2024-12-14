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
        //
        Schema::table('daftar_hadiah', function (Blueprint $table) {
            $table->json('deskripsi_hadiah')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('daftar_hadiah', function (Blueprint $table) {
            $table->text('deskripsi_hadiah')->nullable()->change(); // Kembalikan ke tipe sebelumnya jika dibutuhkan
        });
    }
};
