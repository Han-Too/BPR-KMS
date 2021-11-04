<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->string('nama_karyawan');
            $table->string('jabatan');
            $table->string('npwp');
            $table->string('gaji_pokok');
            $table->string('tunjangan_kesehatan');
            $table->string('thr');
            $table->string('lembur');
            $table->string('tunjangan_bpjs');
            $table->string('iuran_bpjs_kesehatan');
            $table->string('jaminan_hari_tua');
            $table->string('jaminan_kematian');
            $table->string('jaminan_kecelakaan');
            $table->string('jaminan_pesiun');
            $table->string('pph21');
            $table->string('pot_dplk');
            $table->string('pot_denda');
            $table->string('pot_kredit');
            $table->string('bpjs_kes');
            $table->string('bpjs_jamsostek');
            $table->string('iuran_bpjstk');
            $table->string('iuran_jp');
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
        Schema::dropIfExists('penggajians');
    }
}
