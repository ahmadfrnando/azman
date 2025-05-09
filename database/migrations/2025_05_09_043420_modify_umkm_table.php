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
        Schema::dropIfExists('umkm');

        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('nama');
            $table->string('deskripsi');
            $table->decimal('harga_satuan', 10,2)->default(0);
            $table->string('gambar')->nullable();
            $table->integer('tersedia')->default(0);
            $table->integer('dipesan')->default(0);
            $table->integer('total_stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
