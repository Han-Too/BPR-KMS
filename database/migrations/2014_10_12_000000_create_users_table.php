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
            $table->id();
            $table->string('id_karyawan');
            $table->integer('id_user');
            $table->string('profile_photo_path')->nullable();
            $table->string('name');
            $table->date('tgl_masuk');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->string('status_karyawan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('password');
            $table->string('role')->nullable();
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
