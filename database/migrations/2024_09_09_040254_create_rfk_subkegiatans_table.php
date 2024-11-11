<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rfk_subkegiatans', function (Blueprint $table) {
            $table->increments('id_subkegiatan');
            $table->integer('id_sopd')->unsigned();
            $table->integer('id_kegiatan')->unsigned();
            $table->string('subkegiatan_kode', 10)->nullable();
            $table->string('subkegiatan_sasaran')->nullable();
            $table->string('subkegiatan')->nullable();
            $table->string('subkegiatan_indikator_kinerja')->nullable();
            $table->string('kode_rekening')->nullable();
            $table->string('pagu_subkegiatan',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_subkegiatans');
    }
};
