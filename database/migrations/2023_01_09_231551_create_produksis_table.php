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
        Schema::create('produksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klasifikasi_id');
            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasi_tanamen')->onDelete('cascade');
            $table->unsignedBigInteger('tahun_panen_id');
            $table->foreign('tahun_panen_id')->references('id')->on('tahun_panens')->onDelete('cascade');
            $table->unsignedBigInteger('tanaman_id');
            $table->foreign('tanaman_id')->references('id')->on('tanamen')->onDelete('cascade');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->string('jumlah');
            $table->string('luas_panen');
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
        Schema::dropIfExists('produksis');
    }
};
