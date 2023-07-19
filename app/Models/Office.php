<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'office';
    protected $fillable = ['office_name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
