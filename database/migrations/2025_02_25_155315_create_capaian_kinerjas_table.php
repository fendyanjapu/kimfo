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
        Schema::create('capaian_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('indikator_id');
            $table->char('bulan', 3);
            $table->string('jumlah', 10);
            $table->string('bukti_capaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capaian_kinerjas');
    }
};
