<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(); // Nama pengguna, opsional
            $table->string('email')->nullable(); // Email pengguna, opsional
            $table->tinyInteger('rating')->nullable(); // Rating misal 1-5, opsional
            $table->text('komentar'); // Komentar/feedback dari pengguna, wajib
            $table->string('diagnosa_penyakit')->nullable(); // Penyakit yg didiagnosa jika feedback terkait hasil
            $table->json('sesi_diagnosa')->nullable(); // Bisa simpan ID sesi atau ringkasan gejala
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};