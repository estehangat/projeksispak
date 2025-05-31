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
        Schema::create('aturan_ispa', function (Blueprint $table) {
            $table->id();
            $table->string('id_gejala_sekarang'); // Merujuk ke gejala.kode_gejala
            $table->enum('jawaban', ['YA', 'TIDAK']);
            $table->string('id_gejala_selanjutnya')->nullable(); // Merujuk ke gejala.kode_gejala
            $table->string('id_penyakit_hasil')->nullable(); // Merujuk ke penyakit.kode_penyakit
            $table->boolean('is_pertanyaan_awal')->default(false);
            $table->timestamps();

            // Jika Anda ingin menggunakan foreign key constraints (disarankan)
            // Pastikan tabel gejala dan penyakit sudah ada dan memiliki kolom kode_gejala/kode_penyakit
            // $table->foreign('id_gejala_sekarang')->references('kode_gejala')->on('gejala')->onDelete('cascade');
            // $table->foreign('id_gejala_selanjutnya')->references('kode_gejala')->on('gejala')->onDelete('set null');
            // $table->foreign('id_penyakit_hasil')->references('kode_penyakit')->on('penyakit')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aturan_ispa');
    }
};