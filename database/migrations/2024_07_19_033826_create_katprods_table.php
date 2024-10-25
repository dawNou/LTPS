<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKatprodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katprods', function (Blueprint $table) {
            $table->mediumIncrements('katprod_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->string('namakatprod', 50)->unique(); // Membatasi panjang string menjadi 50 karakter
            $table->string('slug', 50)->unique(); // Membatasi panjang string menjadi 50 karakter
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
        Schema::dropIfExists('katprods');
    }
}
