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
        Schema::create('pesanan_transportasi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_transportasi');
            $table->date('tanggal_jemput');
            $table->time('waktu_jemput');
            $table->text('lokasi_jemput');
            $table->text('lokasi_tujuan');
            $table->integer('jumlah_kendaraan');
            $table->integer('jumlah_hari');
            $table->integer('jumlah_penumpang');
            $table->string('no_hp');
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
        Schema::dropIfExists('pesanan_transportasi');
    }
};
