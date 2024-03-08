<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;
    protected $table = 'user', $guarded = [];

    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($user) {
            $user->id = Str::uuid();
        });
    }
}
