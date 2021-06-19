<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'education_qualifications';
    protected $fillable = [
        'emp_id',
        'institute',
        'course',
        'year_passing',
        'percentage',
    ];
    
}
