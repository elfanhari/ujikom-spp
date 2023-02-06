<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userphoto extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'url'];

    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

}
