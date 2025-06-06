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
            $table->date('tanggal_checkin');
            $table->integer('jumlah_orang');
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->boolean('status_pesanan')->default(0);
            $table->text('catatan')->nullable();
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
