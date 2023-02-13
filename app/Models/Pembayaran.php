<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['user']; // Mengurangi N+1 Problem
    
    public function gate()
    {
        if(auth()->user()->level !== 'admin'){
            return view('denied');
        }
    }

    public function userPetugas() //relasiInverse
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

    public function userSiswa() //relasiInverse
    {
        return $this->belongsTo(User::class, 'siswa_id', 'id');
    }

    public function bulanbayar() //relasiInverse
    {
        return $this->belongsTo(Bulanbayar::class, 'bulanbayar_id', 'id');
    }

    public function buktipembayaran() //relasi
    {
        return $this->hasOne(Buktipembayaran::class, 'pembayaran_id','id');
    }

    public function metodepembayaran() //relasiInverse
    {
        return $this->belongsTo(Metodepembayaran::class, 'metodepembayaran_id', 'id');
    }

    public function getRouteKeyName() // Route Model Bindings
    {
        return 'identifier';
    }

}
