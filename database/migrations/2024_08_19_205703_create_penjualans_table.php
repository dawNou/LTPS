<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id('penjualan_id'); // Kolom penjualan_id sebagai primary key
            $table->string('nama_pelanggan'); // Kolom untuk menyimpan nama pelanggan
            $table->string('email'); // Kolom untuk menyimpan email pelanggan
            $table->integer('produk_id'); // Kolom untuk menyimpan ID produk menggunakan tipe data integer
            $table->integer('kuantitas'); // Kolom untuk menyimpan jumlah produk yang dibeli
            $table->integer('harga'); // Kolom untuk menyimpan harga produk
            $table->timestamps(); // Kolom untuk menyimpan timestamps created_at dan updated_at

             // Menambahkan foreign key constraint jika diperlukan
            $table->foreign('produk_id')->references('produk_id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
