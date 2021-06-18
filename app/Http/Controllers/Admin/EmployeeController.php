<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('admin.employee.index', compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'designation'=>'required|max:191',
        ]);

        if($validator->fails())
        {

        }
        else
        {
            $createEmployee = new User;
            $createEmployee->name = $request->name;
            $createEmployee->email = $request->name;
            $createEmployee->password = Hash::make($request->password);

        }

    }
}
