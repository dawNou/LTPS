<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_keyword', function (Blueprint $table) {
            $table->mediumIncrements('category_keyword_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('category_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->unsignedMediumInteger('keyword_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('category_id')->references('category_id')->on('categories');
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
        Schema::dropIfExists('category_keyword');
    }
}
