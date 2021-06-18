<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Employee\Employee;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Hash;


// class EmployeeImport implements ToModel, WithHeadings, WithUpserts
class EmployeeImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = User::create([
                'name'     => $row['name'],
                'email'    => $row['email'],
                'password' => \Hash::make($row['password']),
            ]);
            $user->assignRole($row['role']);

            Employee::create([
                'user_id'  => $user->id,
                'designation'    => $row['designation'],
                'salary' => $row['salary'],
                'marital_status' => $row['marital_status'],
                'dob' => $row['dob'],
                'address' => $row['address'],
                'phone' => $row['phone'],
            ]);
        }
    }

 

}
