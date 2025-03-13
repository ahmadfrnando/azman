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
        Schema::table('penginapan', function (Blueprint $table) {
            $table->string('no_wa')->nullable();
        });
        Schema::table('transportasi', function (Blueprint $table) {
            $table->string('no_wa')->nullable();
        });
        Schema::table('umkm', function (Blueprint $table) {
            $table->string('no_wa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penginapan', function (Blueprint $table) {
            $table->dropColumn('no_wa');
        });
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn('no_wa');
        });
        Schema::table('transportasi', function (Blueprint $table) {
            $table->dropColumn('no_wa');
        });

    }
};
