<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananUmkm extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_umkm';

    protected $guarded = [];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id_umkm');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
