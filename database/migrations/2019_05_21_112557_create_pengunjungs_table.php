<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengunjungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIK');
            $table->string('Nama');
            $table->string('TempatLahir');
            $table->string('TglLahir');
            $table->string('JenisKelamin');
            $table->string('GolDarah');
            $table->string('Alamat');
            $table->string('RT');
            $table->string('RW');
            $table->string('Kecamatan');
            $table->string('Kelurahan');
            $table->string('Agama');
            $table->string('status');
            $table->string('Pekerjaan');
            $table->string('Provinsi');
            $table->string('Kota');
            $table->string('Kewarganegaraan');
            $table->text('Foto');
            $table->text('TandaTangan');
            $table->text('FingerPrint');
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
        Schema::dropIfExists('pengunjungs');
    }
}
