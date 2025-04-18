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
        Schema::create('pesanan_penginapan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penginapan');
            $table->integer('id_user');
            $table->integer('jumlah_kamar');
            $table->integer('jumlah_hari');
            $table->boolean('is_dipesan')->default(0);
            $table->text('pesan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_penginapan');
    }
};
