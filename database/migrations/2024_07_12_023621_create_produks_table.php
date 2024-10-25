<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->mediumIncrements('produk_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('katprod_id'); // Menggunakan MEDIUMINT untuk foreign key
            $table->string('nama_produk', 75)->unique(); // Membatasi panjang string menjadi 75 karakter
            $table->string('slug', 75)->unique(); // Membatasi panjang string menjadi 75 karakter
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('katprod_id')->references('katprod_id')->on('katprods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
