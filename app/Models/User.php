<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['kelas'];

    public function pembayaranPetugas() //relasi
    {
        return $this->hasMany(Pembayaran::class, 'petugas_id', 'id');
    }

    public function pembayaranSiswa() //relasi
    {
        return $this->hasMany(Pembayaran::class, 'siswa_id', 'id');
    }   

    public function spp() //relasiInverse
    {
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }

    public function kelas() //relasiInverse
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function userphoto() {
        return $this->hasOne(Userphoto::class, 'user_id','id');
    }

    public function notifikasiPengirim() //relasi
    {
        return $this->hasMany(Notifikasi::class, 'pengirim_id', 'id');
    }

    public function notifikasiPenerima() //relasi
    {
        return $this->hasMany(Notifikasi::class, 'penerima_id', 'id');
    }   

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function setPasswordAttribute($password) // Bcrypt Otomatis
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // public function setIdentifierAttribute($identifier) // Bcrypt Otomatis
    // {
    //     $this->attributes['identifier'] = hash('md5', $identifier . '_1');
    // }

    public function routeNotificationForNexmo($notification)
    {
        // $telepon = Str::replaceFirst('0', '62', $this->telepon);
        // return $this->telepon;
        return '6285315755352';
    }

    public function logaktivitas() //relasi
    {
        return $this->hasMany(Logaktivitas::class, 'user_id', 'id');
    }

    public function login_session() {
        return $this->hasOne(LoginSession::class, 'user_id','id');
    }

}