<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->mediumIncrements('post_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->unsignedMediumInteger('category_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->unsignedMediumInteger('user_id'); // Menggunakan MEDIUMINT untuk foreign key dan unsigned
            $table->string('title', 100); // Membatasi panjang string menjadi 100 karakter
            $table->string('slug', 100)->unique(); // Membatasi panjang string menjadi 100 karakter
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
