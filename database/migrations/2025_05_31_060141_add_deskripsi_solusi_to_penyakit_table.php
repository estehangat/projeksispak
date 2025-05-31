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
        Schema::table('penyakit', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('penyakit');
            $table->text('solusi')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyakit', function (Blueprint $table) {
            $table->dropColumn(['deskripsi', 'solusi']);
        });
    }
};