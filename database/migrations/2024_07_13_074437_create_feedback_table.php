<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->mediumIncrements('feedback_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('user_id'); // Menggunakan MEDIUMINT untuk foreign key
            $table->unsignedMediumInteger('produk_id'); // Menggunakan MEDIUMINT untuk foreign key
            $table->unsignedMediumInteger('pertanyaan_id'); // Menggunakan MEDIUMINT untuk foreign key
            $table->text('jawaban');
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('produk_id')->references('produk_id')->on('produks');
            $table->foreign('pertanyaan_id')->references('pertanyaan_id')->on('pertanyaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
