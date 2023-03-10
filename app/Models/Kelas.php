<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    // protected $with = ['kompetensikeahlian']; // Mengurangi N+1 Problem

    public function kompetensikeahlian() // relasiInverse
    {
        return $this->belongsTo(Kompetensikeahlian::class, 'kompetensikeahlian_id', 'id');
    }

    public function userSiswa() //relasi
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function getRouteKeyName() //RouteModelBindings
    {
        return 'identifier';
    }

}