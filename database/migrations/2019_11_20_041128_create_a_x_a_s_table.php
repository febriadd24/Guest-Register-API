<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAXASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_x_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('AGAMA');
            $table->string('ALAMAT');
            $table->string('COUNT_DATA')->default('1');
            $table->string('JENIS_KLMIN');
            $table->string('JENIS_PKRJN');
            $table->string('KAB_NAME');
            $table->string('KEC_NAME');
            $table->string('KEL_NAME');
            $table->string('NAMA_LGKP');
            $table->string('NAMA_LGKP_IBU');
            $table->string('NIK');
            $table->string('NO_KAB');
            $table->string('NO_KEC');
            $table->string('NO_KEL');
            $table->string('NO_KK');
            $table->string('NO_PROP');
            $table->string('NO_RT');
            $table->string('NO_RW');
            $table->string('PDDK_AKH');
            $table->string('PROP_NAME');
            $table->string('STATUS_KAWIN');
            $table->string('STAT_HBKEL');
            $table->string('TGL_LAHIR');
            $table->string('TMPT_LAHIR');
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
        Schema::dropIfExists('a_x_a_s');
    }
}
