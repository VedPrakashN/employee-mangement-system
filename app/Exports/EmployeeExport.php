<?php

namespace App\Exports;

use App\Models\User;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $user = User::join('employees', 'users.id', '=', 'employees.user_id')
            ->select('users.*', 'employees.*')->role('employee')->get();
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            '',
            'employee',
            $user->designation,
            $user->salary,
            $user->marital_status,
            $user->dob,
            $user->address,
            $user->phone,
        ];
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'password',
            'role',
            'designation',
            'salary',
            'marital_status',
            'dob',
            'address',
            'phone',
        ];
    }

}
