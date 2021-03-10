<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'idKaryawan',
        'employee_name',
        'employee_salary',
        'employee_age',
        'profile_image'
    ];
}
