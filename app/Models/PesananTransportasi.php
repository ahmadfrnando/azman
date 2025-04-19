<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananTransportasi extends Model
{
    use HasFactory;

    protected $table = 'pesanan_transportasi';

    protected $guarded = [];

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class, 'id_transportasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
