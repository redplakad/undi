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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('no_rek')->nullable();
            $table->string('no_kupon');
            $table->string('nama');
            $table->string('area');
            $table->float('plafon')->nullable();
            $table->float('kelipatan_plafon')->nullable();
            $table->float('kelipatan_topup')->nullable();
            $table->float('jumlah_kupon')->nullable();
            $table->float('tgl_buka')->nullable();
            $table->float('tgl_jt')->nullable();
            $table->string('kab_kota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse them migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
};
