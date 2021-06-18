<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'previous_experiences';
    protected $fillable = [
        'emp_id', //emp_id = user_id
        'company',
        'designation',
        'joining',
        'leaving',
        'ctc',
    ];
}
