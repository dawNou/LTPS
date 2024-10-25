<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_keyword', function (Blueprint $table) {
            $table->mediumIncrements('post_keyword_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('post_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->unsignedMediumInteger('keyword_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('keyword_id')->references('keyword_id')->on('keywords');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_keyword');
    }
}
