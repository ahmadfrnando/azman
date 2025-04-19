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
            $table->integer('maksimal_penumpang')->after('gambar')->default(0);
            $table->decimal('harga', 10, 2)->after('slug')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transportasi', function (Blueprint $table) {
            $table->dropColumn('maksimal_penumpang');
            $table->dropColumn('harga');
        });
    }
};
