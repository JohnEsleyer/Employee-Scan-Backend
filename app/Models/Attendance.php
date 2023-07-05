<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'employee_id',
        'company_id',
        'scanner_id',
        'time_in',
        'time_out',
        'date_entered',
    ];
}