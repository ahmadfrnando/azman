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
        Schema::table('pesanan_transportasi', function (Blueprint $table) {
            $table->boolean('is_riwayat')->default(0);
        });
        Schema::table('pesanan_penginapan', function (Blueprint $table) {
            $table->boolean('is_riwayat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan_transportasi', function (Blueprint $table) {
            $table->dropColumn('is_riwayat');
        });
        Schema::table('pesanan_penginapan', function (Blueprint $table) {
            $table->dropColumn('is_riwayat');
        });
    }
};
