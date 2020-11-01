<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstaller extends Model
{
     //

     protected $table = "data_installer";
    
     protected $fillable = [
         'id_user',
         'installer_name',
         'installer_contact_name',
         'installer_phone',
         'installer_email',
         'installer_adr_1',
         'installer_adr_2',
         'installer_city',
         'installer_state',
         'installer_pincode',
         'installer_number_of_project',
         'installer_total_installer',
         'installer_maximum_installer',
         'installer_number_of_employees',
         'installer_maximum_distance'
     ];
}
