<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpprofileController extends Controller
{
    public function index()
    {

        return view('frontend.employee.profile');
    }

    public function profileupdate(Request $request)
    {
        $emp_id = Auth::user()->id;
        $profileupdate = User::find($emp_id);
        $profileupdate->name = $request->input('name');
        $profileupdate->update();

        $empProfileupdate = Employee::where('user_id',$emp_id)->first();
        $empProfileupdate->designation = $request->input('designation');
        $empProfileupdate->salary = $request->input('salary');
        $empProfileupdate->marital_status = $request->input('marital_status');
        $empProfileupdate->dob = $request->input('dob');
        $empProfileupdate->phone = $request->input('phone');
        $empProfileupdate->address = $request->input('address');
        $empProfileupdate->update();

        return redirect()->back()->with('status','Profile Updated Successfully');
    }
}
