<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique(); // Untuk URL yang ramah SEO
            $table->text('ringkasan')->nullable(); // Ringkasan singkat artikel
            $table->longText('konten'); // Isi lengkap artikel (bisa HTML atau Markdown)
            $table->string('gambar_thumbnail')->nullable(); // Path atau URL ke gambar thumbnail
            $table->string('penulis')->nullable(); // Nama penulis atau sumber
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable(); // Waktu publikasi
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};