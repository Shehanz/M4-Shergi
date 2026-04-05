<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('armada_pesawat_tempurs', function (Blueprint $table) {
        $table->id();
        $table->string('kode_armada')->unique();
        $table->string('nama_pesawat');
        $table->string('tipe');
        $table->integer('tahun_produksi');
        $table->string('negara_pembuat');
        $table->integer('jumlah_unit');
        $table->enum('status', ['Aktif', 'Perbaikan', 'Cadangan'])->default('Aktif');
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armada_pesawat_tempurs');
    }
};
