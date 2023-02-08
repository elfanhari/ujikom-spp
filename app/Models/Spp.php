<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Spp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function userSiswa() //relasi
    {
        return $this->hasMany(User::class, 'spp_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function setIdentifierAttribute($identifier)
    {
        $this->attributes['identifier'] = 'i' . Str::random(9);
    }

}
