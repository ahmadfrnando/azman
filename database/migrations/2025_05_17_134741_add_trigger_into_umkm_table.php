<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TRIGGER update_tersedia_after_umkm_dipesan
            AFTER UPDATE ON pemesanan_umkm
            FOR EACH ROW
            BEGIN
                IF NEW.status_pesanan = 1 AND OLD.status_pesanan = 0 THEN
                    UPDATE umkm
                    SET tersedia = tersedia - NEW.jumlah, 
                            dipesan = NEW.jumlah
                    WHERE id = NEW.id_umkm;
                ELSEIF NEW.status_pesanan = 0 AND OLD.status_pesanan = 1 THEN
                    UPDATE umkm
                    SET tersedia = tersedia + NEW.jumlah, 
                            dipesan = NEW.jumlah
                    WHERE id = NEW.id_umkm;
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TRIGGER IF EXISTS update_tersedia_after_umkm_dipesan");
    }
};
