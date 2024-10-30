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
        Schema::create('penggunaan_kas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sopd')->unsigned();
            $table->integer('id_program')->unsigned();
            $table->integer('id_kegiatan')->unsigned();
            $table->integer('id_subkegiatan')->unsigned();
            $table->string('bulan', 2)->nullable();
            $table->string('triwulan', 4)->nullable();
            $table->date('tanggal');
            $table->string('uraian', 255)->nullable();
            $table->string('pagu', 100)->nullable();
            $table->string('bukti_keg',255)->nullable();
            $table->string('keterangan',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunaan_kas');
    }
};
