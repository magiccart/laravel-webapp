<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $table = 'inspection';

    protected $fillable = [
        'id_user',
        'id_contact',
        'lat',
        'long',
        'panel_area',
        'inverter_area',
        'wiring_path_video',
        'panel_image',
        'document_1',
        'document_2',
        'document_3',
        'daily_kwh',
        'system_size',
        'tpc',
        'emi',
        'average_monthly_usage',
        'average_sun_hours',
        'bill_offset',
        'potential_install_area',
        'small_leg',
        'large_leg',
        'number_of_rows',
        'inverter_length',
        'deposit',
        'remaining',
        'down_payment',
        'of_months',
        'interest',
        'existing_home',
        'bank_id',
        'bank_branch',
        'session_1',
        'session_2',
        'session_3',
        'session_4',
        'session_5',
        'status',
];
}
