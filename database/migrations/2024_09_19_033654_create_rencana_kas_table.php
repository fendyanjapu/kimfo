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
        Schema::create('rencana_kas', function (Blueprint $table) {
            $table->bigIncrements('id_rencana_kas');
            $table->tinyInteger('id_program');
            $table->tinyInteger('id_kegiatan');
            $table->tinyInteger('id_subkegiatan');
            $table->tinyInteger('id_uraian_subkegiatan');
            $table->string('triwulan_i', 100);
            $table->string('triwulan_ii', 100);
            $table->string('triwulan_iii', 100);
            $table->string('triwulan_iv', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_kas');
    }
};
