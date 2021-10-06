<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBANKDIYSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_a_n_k_d_i_y_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('agama');
            $table->string('golongan_darah');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->text('photo_data');
            $table->text('ttd_data');
            $table->string('berlaku_hingga');
            $table->string('user_operator');
            $table->string('IP_address');
            $table->boolean('flag_verifikasi_manual');
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
        Schema::dropIfExists('b_a_n_k_d_i_y_s');
    }
}
