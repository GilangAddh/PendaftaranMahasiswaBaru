<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_users');
            $table->string('nama');
            $table->string('alamat_ktp');
            $table->string('alamat_sekarang');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->integer('no_hp');
            $table->string('email');
            $table->string('kewarganegaraan');
            $table->date('tanggal_lahir');
            $table->string('provinsi_lahir');
            $table->string('kota_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('agama');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulir');
    }
};
