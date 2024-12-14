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
        Schema::create('peserta_kredit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('nomor_cif');
            $table->string('nomor_rekening');
            $table->string('jenis_kredit');
            $table->decimal('saldo_akhir', 15, 2);
            $table->string('no_ktp', 16);
            $table->string('alamat');
            $table->string('wilayah');
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
        Schema::dropIfExists('peserta_kredit');
    }
};
