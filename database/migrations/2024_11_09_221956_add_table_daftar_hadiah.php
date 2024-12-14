<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('daftar_hadiah', function (Blueprint $table) {
            $table->id();
            $table->string('level_hadiah', 50);
            $table->string('nama_hadiah', 100);
            $table->integer('jumlah_hadiah');
            $table->string('gambar_hadiah')->nullable();
            $table->text('deskripsi_hadiah')->nullable();
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
        Schema::dropIfExists('daftar_hadiah');
    }
};
