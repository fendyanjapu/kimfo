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
        Schema::create('rfk_kegiatans', function (Blueprint $table) {
            $table->increments('id_kegiatan');
            $table->integer('id_sopd')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->string('kegiatan_kode', 100)->nullable();
            $table->string('kegiatan_sasaran')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('kegiatan_indikator_kinerja')->nullable();
            $table->string('kode_rekening')->nullable();
            $table->string('pagu_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_kegiatans');
    }
};
