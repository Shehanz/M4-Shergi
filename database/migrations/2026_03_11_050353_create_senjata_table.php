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
         Schema::create('senjata', function (Blueprint $table) {
        $table->id();
        $table->string('nama_senjata');
        $table->string('jenis');
        $table->string('kaliber');
        $table->string('negara_asal');
        $table->integer('tahun_produksi');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senjata');
    }
};
