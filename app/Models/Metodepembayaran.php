<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodepembayaran extends Model
{
    use HasFactory;

    protected $guarded = 'id';

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'metodepembayaran_id', 'id');
    }
}