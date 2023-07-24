<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'user_id',
        'office_id',
        'time_in_am',
        'time_out_am',
        'time_in_pm',
        'time_out_pm',
    ];
}
