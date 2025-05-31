<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            $table->foreignId('provinsi_id')
                  ->after('id') // Atur posisi kolom jika diinginkan
                  ->constrained('provinsis')
                  ->onDelete('cascade'); // Jika provinsi dihapus, kabupaten terkait juga terhapus
        });
    }

    public function down(): void
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            // Hati-hati saat drop foreign key di beberapa DB
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(['provinsi_id']);
            }
            $table->dropColumn('provinsi_id');
        });
    }
};