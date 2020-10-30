<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'id_user',
        'contact_name',
        'contact_email',
        'contact_adr_1',
        'contact_adr_2',
        'contact_pincode',
        'contact_city',
        'contact_state',
        'contact_phone',
        'contact_meu',
        'type_meu',
        'contact_visit',
        'status'
];
}
