<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
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
