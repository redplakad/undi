<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Menambahkan kolom produk di kupon_tabungan
        Schema::table('kupon_tabungan', function (Blueprint $table) {
            $table->string('produk')->nullable()->after('kode_kupon'); // Ganti 'existing_column' dengan nama kolom terakhir
        });

        // Menambahkan kolom produk di kupon_deposito
        Schema::table('kupon_deposito', function (Blueprint $table) {
            $table->string('produk')->nullable()->after('kode_kupon'); // Ganti 'existing_column' dengan nama kolom terakhir
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus kolom produk di kupon_tabungan
        Schema::table('kupon_tabungan', function (Blueprint $table) {
            $table->dropColumn('produk');
        });

        // Menghapus kolom produk di kupon_deposito
        Schema::table('kupon_deposito', function (Blueprint $table) {
            $table->dropColumn('produk');
        });
    }
};
