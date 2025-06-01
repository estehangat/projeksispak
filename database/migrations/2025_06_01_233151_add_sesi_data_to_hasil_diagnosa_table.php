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
        Schema::table('hasil_diagnosa', function (Blueprint $table) {
            if (!Schema::hasColumn('hasil_diagnosa', 'biodata_sesi')) {
                $table->json('biodata_sesi')->nullable()->after('penyakit_id');
            }
            if (!Schema::hasColumn('hasil_diagnosa', 'riwayat_jawaban_sesi')) {
                $table->json('riwayat_jawaban_sesi')->nullable()->after('biodata_sesi'); 
            }
        });
    }
    public function down(): void
    {
        Schema::table('hasil_diagnosa', function (Blueprint $table) {
            $table->dropColumn(['biodata_sesi', 'riwayat_jawaban_sesi']);
        });
    }
};
