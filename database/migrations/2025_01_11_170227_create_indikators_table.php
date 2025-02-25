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
        Schema::create('indikators', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('sasaran_id');
            $table->string('nama_indikator', 255);
            $table->string('target', 10);
            $table->string('satuan', 100)->nullable();
            $table->smallInteger('target_waktu_id');
            $table->char('dari_bulan', 2)->nullable();
            $table->char('sampai_bulan', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikators');
    }
};
