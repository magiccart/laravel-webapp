<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'active',
        'email_verified_at',
        'password',
        'user_key',
        'user_type',
        'remember_token'
];
}
