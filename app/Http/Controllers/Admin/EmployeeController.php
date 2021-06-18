<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use Spatie\Permission\Models\Role;
use App\Models\Employee\Experience;
use App\Http\Controllers\Controller;
use App\Models\Employee\Familymember;
use Illuminate\Support\Facades\Hash;

use App\Models\Employee\Qualification;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $userEmployee = User::role('employee')->get();
        return view('admin.employee.index', compact('userEmployee'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.employee.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $createEmployeevalidator = Validator::make($request->all(), [
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'designation'=>'required|max:191',
            'salary'=>'required|max:191',
            'roles' => 'required'
        ]);

        if($createEmployeevalidator->fails())
        {
            return back()->withErrors($createEmployeevalidator)->withInput();
        }
        else
        {
            $createEmployee = new User;
            $createEmployee->name = $request->name;
            $createEmployee->email = $request->email;
            $createEmployee->password = Hash::make($request->password);
            $createEmployee->save();
            $createEmployee->assignRole($request->input('roles'));

            $employeeDetials = new Employee;
            $employeeDetials->user_id = $createEmployee->id;
            $employeeDetials->designation = $request->designation;
            $employeeDetials->salary = $request->salary;
            $employeeDetials->marital_status = $request->marital_status;
            $employeeDetials->dob = $request->dob;
            $employeeDetials->phone = $request->phone;
            $employeeDetials->address = $request->address;
            $employeeDetials->save();
            return redirect()->back()->with('status','Employee Added Successfully');
        }

    }

    public function edit($id)
    {
        if(User::where('id',$id)->exists())
        {
            $roles = Role::pluck('name','name')->all();
            $userEmp = User::find($id);
            $emp_detail = Employee::where('user_id',$userEmp->id)->first();

            $emp_experience = Experience::where('emp_id',$userEmp->id)->get();
            $emp_qualification = Qualification::where('emp_id',$userEmp->id)->get();
            $emp_familymember = Familymember::where('emp_id',$userEmp->id)->get();

            return view('admin.employee.edit', compact('roles','userEmp','emp_detail','emp_experience','emp_qualification','emp_familymember'));
        }
        else
        {
            return redirect()->back()->with('status','Not Found');
        }
    }

    public function update(Request $request, $id)
    {
        if(User::where('id',$id)->exists())
        {
            $empDetailValidator = Validator::make($request->all(), [
                'name'=>'required|max:191',
                // 'password'=>'required|string|min:8|confirmed',
                'designation'=>'required|max:191',
                'salary'=>'required|max:191',
                // 'roles' => 'required'
            ]);

            if($empDetailValidator->fails())
            {
                return redirect()->back()->withErrors($empDetailValidator);
            }
            else
            {
                // $roles = Role::pluck('name','name')->all();
                $userEmp = User::where('id',$id)->first();
                $userEmp->name = $request->name;
                if(!empty($request->input('password'))){
                    $userEmp->password = Hash::make($request->password);
                }
                $userEmp->save();
                if(!empty($request->input('roles'))){
                    $userEmp->assignRole($request->input('roles'));
                }
                $emp_detail = Employee::where('user_id',$userEmp->id)->first();
                $emp_detail->user_id = $userEmp->id;
                $emp_detail->designation = $request->designation;
                $emp_detail->salary = $request->salary;
                $emp_detail->marital_status = $request->marital_status;
                $emp_detail->dob = $request->dob;
                $emp_detail->phone = $request->phone;
                $emp_detail->address = $request->address;
                $emp_detail->save();

                if($request->input('company') != '' )
                {
                    if($request->input('company') != '' ||
                        $request->input('company_designation') != '' ||
                        $request->input('joining') != '' ||
                        $request->input('leaving') != ''
                    )
                    {
                        $user_id = $id;
                        $company = $request->input('company');
                        foreach ($company as $key=>$items)
                        {
                            $updateExperience = Experience::where('id', $request->input('experience_id')[$key])
                            ->where('emp_id', $user_id)
                            ->update([
                                'company'=>$request->input('company')[$key],
                                'designation'=>$request->input('company_designation')[$key],
                                'joining'=>$request->input('joining')[$key],
                                'leaving'=>$request->input('leaving')[$key],
                                'ctc'=>$request->input('ctc')[$key],
                            ]);

                        }
                    }
                    else
                    {
                        return redirect()->back()->with('status','Experience Fields are mandetory.');
                    }
                }

                if($request->input('institute') != '' )
                {
                    if($request->input('institute') != '' ||
                        $request->input('course') != '' ||
                        $request->input('year_passing') != '' ||
                        $request->input('percentage') != ''
                    )
                    {
                        $user_id = $id;
                        $institute = $request->input('institute');
                        foreach ($institute as $key=>$items)
                        {
                            $updateQualification = Qualification::where('id', $request->input('qualification_id')[$key])
                            ->where('emp_id', $user_id)
                            ->update([
                                'emp_id'=>$user_id,
                                'institute'=>$request->input('institute')[$key],
                                'course'=>$request->input('course')[$key],
                                'year_passing'=>$request->input('year_passing')[$key],
                                'percentage'=>$request->input('percentage')[$key],
                            ]);
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('status','All Qualification Fields are mandetory.');
                    }
                }

                if($request->input('member_name') != '')
                {
                    if($request->input('member_name') != '' ||
                        $request->input('relation') != '' ||
                        $request->input('member_phone') != ''
                    )
                    {
                        $user_id = $id;
                        $member_name = $request->input('member_name');
                        foreach ($institute as $key=>$items)
                        {
                            $updateFamilymember = Familymember::where('id', $request->input('familymember_id')[$key])
                            ->where('emp_id', $user_id)
                            ->update([
                                'emp_id'=>$user_id,
                                'name'=>$request->input('member_name')[$key],
                                'relation'=>$request->input('relation')[$key],
                                'phone'=>$request->input('member_phone')[$key],
                            ]);
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('status','All Family Member Fields are mandetory.');
                    }
                }

                return redirect()->back()->with('status','All Employee Data Updated.');


            }
        }
        else
        {
            return redirect()->back()->with('status','Not Found');
        }
    }

    public function addexperience(Request $request, $id)
    {
        if($request->input('company') != '' ||
            $request->input('company_designation') != '' ||
            $request->input('joining') != '' ||
            $request->input('leaving') != ''
        )
        {
            $user_id = $id;
            $company = $request->input('company');
            foreach ($company as $key=>$items)
            {
                $createExperience = Experience::create([
                    'emp_id'=>$user_id,
                    'company'=>$request->input('company')[$key],
                    'designation'=>$request->input('company_designation')[$key],
                    'joining'=>$request->input('joining')[$key],
                    'leaving'=>$request->input('leaving')[$key],
                    'ctc'=>$request->input('ctc')[$key],
                ]);
            }
            return redirect()->back()->with('status','Experience Added Successfully.');
        }
        else
        {
            return redirect()->back()->with('status','All Experience Fields are mandetory.');
        }
    }

    public function addqualification(Request $request, $id)
    {
        if($request->input('institute') != '' ||
            $request->input('course') != '' ||
            $request->input('year_passing') != '' ||
            $request->input('percentage') != ''
        )
        {
            $user_id = $id;
            $institute = $request->input('institute');
            foreach ($institute as $key=>$items)
            {
                $createQualification = Qualification::create([
                    'emp_id'=>$user_id,
                    'institute'=>$request->input('institute')[$key],
                    'course'=>$request->input('course')[$key],
                    'year_passing'=>$request->input('year_passing')[$key],
                    'percentage'=>$request->input('percentage')[$key],
                ]);
            }
            return redirect()->back()->with('status','Qualification Added Successfully.');
        }
        else
        {
            return redirect()->back()->with('status','All Qualification Fields are mandetory.');
        }
    }

    public function addfamilymember(Request $request, $id)
    {
        if($request->input('member_name') != '' ||
            $request->input('relation') != '' ||
            $request->input('member_phone') != ''
        )
        {
            $user_id = $id;
            $member_name = $request->input('member_name');
            foreach ($member_name as $key=>$items)
            {
                $createFamilymember = Familymember::create([
                    'emp_id'=>$user_id,
                    'name'=>$request->input('member_name')[$key],
                    'relation'=>$request->input('relation')[$key],
                    'phone'=>$request->input('member_phone')[$key],
                ]);
            }
            return redirect()->back()->with('status','Family Member Added Successfully.');
        }
        else
        {
            return redirect()->back()->with('status','All Family Member Fields are mandetory.');
        }
    }

    public function deleteexperience($id, $emp_id)
    {
        $emp_experience = Experience::where('id',$id)->where('emp_id',$emp_id)->first();
        $emp_experience->delete();
        return redirect()->back()->with('status',''.$emp_experience->company.' Experience Deleted');
    }

    public function deletequalification($id, $emp_id)
    {
        $emp_qualifi = Qualification::where('id',$id)->where('emp_id',$emp_id)->first();
        $emp_qualifi->delete();
        return redirect()->back()->with('status',''.$emp_qualifi->institute.' Qualification Deleted');
    }

    public function deletefamilymember($id, $emp_id)
    {
        $emp_family = Familymember::where('id',$id)->where('emp_id',$emp_id)->first();
        $emp_family->delete();
        return redirect()->back()->with('status',''.$emp_family->name.' Family Member Deleted');
    }

    public function destroy($id)
    {
        if(User::find($id)->exists())
        {
            $user = User::find($id);
            $user->delete();
            Employee::where('user_id', $user->id)->delete();
            Experience::where('emp_id', $user->id)->delete();
            Qualification::where('emp_id', $user->id)->delete();
            Familymember::where('emp_id', $user->id)->delete();
            return redirect()->back()->with('status','Employee Deleted');
        }
        else
        {
            return redirect()->back()->with('status','No Employee Found');
        }
    }

}
