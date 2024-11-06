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
        Schema::create('ikus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sopd')->unsigned();
            $table->string('nama_dokumen',255)->nullable();
            $table->string('dokumen',255)->nullable();
            $table->string('jenis_dokumen',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikus');
    }
};
