<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumIncrements('user_id'); // Menggunakan MEDIUMINT sebagai tipe data dengan auto-increment
            $table->string('name', 50); // Membatasi panjang string menjadi 50 karakter
            $table->string('username', 50)->unique(); // Membatasi panjang string menjadi 50 karakter
            $table->string('email', 50)->unique(); // Membatasi panjang string menjadi 50 karakter
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100); // Membatasi panjang string menjadi 100 karakter
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
