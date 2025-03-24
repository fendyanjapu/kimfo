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
        Schema::create('persentase_capaians', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->char('bulan', 2);
            $table->char('tahun', 4);
            $table->float('persentase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persentase_capaians');
    }
};
