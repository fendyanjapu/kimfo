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
        Schema::create('target_bulanans', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id');
            $table->smallInteger('indikator_id')->unique();
            $table->string('jan',10);
            $table->string('feb',10);
            $table->string('mar',10);
            $table->string('apr',10);
            $table->string('mei',10);
            $table->string('jun',10);
            $table->string('jul',10);
            $table->string('agu',10);
            $table->string('sep',10);
            $table->string('okt',10);
            $table->string('nov',10);
            $table->string('des',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_bulanans');
    }
};
