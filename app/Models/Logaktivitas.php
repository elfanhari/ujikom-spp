<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logaktivitas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() //relasiInverse
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
