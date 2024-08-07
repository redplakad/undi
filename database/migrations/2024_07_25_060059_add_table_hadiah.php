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
        Schema::create('hadiah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hadiah');
            $table->integer('stok_hadiah');
            $table->string('foto')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiah');
    }
};
