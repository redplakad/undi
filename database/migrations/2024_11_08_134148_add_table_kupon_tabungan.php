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
        Schema::create('kupon_tabungan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('noid_peserta');
            $table->string('nomor_cif');
            $table->string('nomor_rekening');
            $table->string('nama_nasabah');
            $table->string('kode_kupon');
            $table->string('status');
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
        Schema::dropIfExists('kupon_tabungan');
    }
};
