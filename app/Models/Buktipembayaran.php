<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buktipembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pembayaran() //relasi Inverse
    {
        return $this->belongsTo(Buktipembayaran::class, 'id', 'pembayaran_id');
    }
}
