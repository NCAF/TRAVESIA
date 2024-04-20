<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('destinasi_awal');
            $table->string('destinasi_akhir');
            $table->string('jenis_kendaraan');
            $table->string('no_plat');
            $table->date('hari_berangkat');
            $table->integer('jumlah_kursi');
            $table->integer('jumlah_bagasi');
            $table->text('foto');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi');
    }
};
