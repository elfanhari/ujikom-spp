<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensikeahlian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas() //relasi
    {
        return $this->hasMany(Kelas::class, 'kompetensikeahlian_id', 'id');
    } 
    
    public function getRouteKeyName()
    {
        return 'identifier';
    }
}