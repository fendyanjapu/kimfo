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
        Schema::create('sasaran_utamas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('sasaran_strategis', 255);
            $table->string('indikator_kinerja', 255);
            $table->float('target');
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_utamas');
    }
};
