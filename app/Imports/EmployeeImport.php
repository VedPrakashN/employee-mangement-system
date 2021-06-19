<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Employee\Employee;
// use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
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
        Validator::make($rows->toArray(), [
            '*.name' => 'required',
            '*.email' => 'required|unique:users|email',
            '*.password' => 'required',
            '*.role' => 'required',
            '*.designation' => 'required',
            '*.salary' => 'required',
        ])->validate();

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

    // public function rules(): array
    // {
    //     return [
    //         'email' => Rule::in(['patrick@maatwebsite.nl']),

    //          // Above is alias for as it always validates in batches
    //          '*.email' => Rule::in(['patrick@maatwebsite.nl']),
    //     ];
    // }

}
