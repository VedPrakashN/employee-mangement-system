<?php

namespace App\Models;

use App\Models\Employee\Employee;
use App\Models\Employee\Familymember;
use App\Models\Employee\Qualification;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function singleemployee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'user_id', 'id');
    }

    public function qualification()
    {
        return $this->hasMany(Qualification::class, 'emp_id', 'id');
    }

    public function familymember()
    {
        return $this->hasMany(Familymember::class, 'emp_id', 'id');
    }

}
