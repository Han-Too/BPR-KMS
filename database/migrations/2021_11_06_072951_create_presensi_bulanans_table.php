<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->integer('total_masuk');
            $table->integer('total_izin');
            $table->integer('total_sakit');
            $table->integer('total_alpha');
            $table->integer('total_terlambat');
            $table->string('jam_terlambat');
            $table->integer('total_waktu');
            $table->date('tgl');
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
        Schema::dropIfExists('presensi_bulanans');
    }
}
