<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rumah_sakits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rs');
            $table->text('alamat');
            $table->string('no_telp')->nullable();
            $table->string('website_url')->nullable();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('cascade');
            $table->text('deskripsi_tambahan')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('rumah_sakits');
    }
};
