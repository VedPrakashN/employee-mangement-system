<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familymember extends Model
{
    use HasFactory;
    protected $table = 'family_members';
    protected $fillable = [
        'emp_id',
        'name',
        'relation',
        'phone',
    ];
}
