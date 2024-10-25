<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->mediumIncrements('category_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->string('name', 50)->unique(); // Membatasi panjang string menjadi 50 karakter
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
        Schema::dropIfExists('categories');
    }
}
