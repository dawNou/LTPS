<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->mediumIncrements('keyword_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->string('keyword', 50); // Membatasi panjang string menjadi 50 karakter
            $table->unsignedMediumInteger('frequency'); // Menggunakan MEDIUMINT sebagai tipe data
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
        Schema::dropIfExists('keywords');
    }
}
