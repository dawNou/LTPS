<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->mediumIncrements('pertanyaan_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('katprod_id'); // Menggunakan MEDIUMINT untuk foreign key
            $table->string('soal', 200)->unique(); // Membatasi panjang string menjadi 200 karakter
            $table->string('slug', 200)->unique(); // Membatasi panjang string menjadi 200 karakter
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
        Schema::dropIfExists('pertanyaans');
    }
}
