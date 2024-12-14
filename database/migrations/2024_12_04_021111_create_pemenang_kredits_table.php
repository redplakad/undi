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
        Schema::create('pemenang_kredit', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->unsignedBigInteger('id_peserta');
            $table->unsignedBigInteger('id_hadiah');
            $table->string('no_kupon');
            $table->string('jenis_hadiah');
            $table->string('nama_hadiah');
            $table->string('nama_nasabah');
            $table->integer('jumlah_kupon');
            $table->string('nomor_cif');
            $table->string('nomor_rekening');
            $table->decimal('saldo_akhir', 15, 2);
            $table->string('no_ktp');
            $table->string('alamat');
            $table->string('wilayah');
            $table->string('status');
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemenang_kredit');
    }
};
