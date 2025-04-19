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
        Schema::table('transportasi', function (Blueprint $table) {
            $table->integer('tersedia')->default(0);
            $table->integer('dipesan')->default(0);
            $table->integer('total_kendaraan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transportasi', function (Blueprint $table) {
            $table->dropColumn('tersedia');
            $table->dropColumn('dipesan');
            $table->dropColumn('total_kendaraan');
        });
    }
};
