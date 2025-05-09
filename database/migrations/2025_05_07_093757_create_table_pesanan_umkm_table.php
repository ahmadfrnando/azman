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
        Schema::create('pemesanan_umkm', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_umkm');
            $table->integer('jumlah');
            $table->text('alamat');
            $table->decimal('total_harga', 10, 2)->nullable();
            $table->string('no_hp');
            $table->date('tanggal_pemesanan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_umkm');
    }
};
