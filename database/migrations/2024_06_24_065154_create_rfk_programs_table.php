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
        Schema::create('rfk_programs', function (Blueprint $table) {
            $table->increments('id_program');
            $table->integer('id_sopd')->unsigned();
            $table->string('kode_a', 10);
            $table->string('kode_b', 10);
            $table->string('program_kode', 10);
            $table->string('sasaran');
            $table->string('program');
            $table->string('indikator_kinerja');
            $table->string('kode_rekening', 100);
            $table->string('pagu_program', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfk_programs');
    }
};
