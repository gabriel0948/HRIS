<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';

    protected $fillable = [
        'employee_id',
        'leave_date',
        'am1',
        'am1_code',
        'am2',
        'am2_code',
        'pm1',
        'pm1_code',
        'pm2',
        'pm2_code',
        'undertime',
        'remarks',
    ];
}
