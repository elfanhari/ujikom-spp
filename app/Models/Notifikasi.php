<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['userPengirim', 'userPenerima'];

    public function userPengirim() //relasiInverse
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    public function userPenerima() //relasiInverse
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
    
    public function getRouteKeyName()
    {
        return 'identifier';
    }
}
