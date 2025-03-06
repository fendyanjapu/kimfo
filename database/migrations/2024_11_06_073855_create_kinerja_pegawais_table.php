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
        Schema::create('kinerja_pegawais', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('user_id')->unsigned();
            $table->smallInteger('sasaran_id')->nullable();
            $table->smallInteger('indikator_id')->nullable();
            $table->string('kinerja_harian',255)->nullable();
            $table->float('jumlah')->nullable();
            $table->string('satuan',100)->nullable();
            $table->string('bukti_kegiatan',255)->nullable();
            $table->date('tgl_input')->nullable();
            $table->string('jam_awal', 100)->nullable();
            $table->string('jam_akhir', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerja_pegawais');
    }
};
