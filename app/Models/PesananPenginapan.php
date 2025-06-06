<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananPenginapan extends Model
{
    use HasFactory;

    protected $table = 'pesanan_penginapan';

    protected $guarded = [];

    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class, 'id_penginapan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
