@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Employee</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/employee-store') }}" method="POST">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="EmployeeDetailsTab" data-bs-toggle="tab" data-bs-target="#EmployeeDetails" type="button" role="tab" aria-controls="EmployeeDetails" aria-selected="true">Employee Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="PreviousExperienceTAB" data-bs-toggle="tab" data-bs-target="#PreviousExperience" type="button" role="tab" aria-controls="PreviousExperience" aria-selected="false">Previous Experience</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="EducationQualificationsTAB" data-bs-toggle="tab" data-bs-target="#EducationQualifications" type="button" role="tab" aria-controls="EducationQualifications" aria-selected="false">Education Qualifications</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="FamilyMembersTAB" data-bs-toggle="tab" data-bs-target="#FamilyMembers" type="button" role="tab" aria-controls="FamilyMembers" aria-selected="false">Family Members</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane card-body border fade show active" id="EmployeeDetails" role="tabpanel" aria-labelledby="EmployeeDetailsTab">
                                    <div class="row">
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Full Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') == true ? '': $userEmp->name }}" autocomplete="name" autofocus>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Email Address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Designation</label>
                                            <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" autocomplete="designation">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Martial Status</label>
                                            <select name="marital_status" class="form-control">
                                                <option value="">--Select Marital--</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Date of Birth</label>
                                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" autocomplete="dob">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Phone Number</label>
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                                        </div>
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="">Address</label>
                                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3" autocomplete="address">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="PreviousExperience" role="tabpanel" aria-labelledby="PreviousExperienceTAB">
                                    <div class="row">
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Company</label>
                                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" autocomplete="company">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Job Role (Designation)</label>
                                            <input id="company_designation" type="text" class="form-control @error('company_designation') is-invalid @enderror" name="company_designation" value="{{ old('company_designation') }}" autocomplete="company_designation">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Joining Date</label>
                                            <input id="joining" type="date" class="form-control @error('joining') is-invalid @enderror" name="joining" value="{{ old('joining') }}" autocomplete="joining">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Leaving Date</label>
                                            <input id="leaving" type="date" class="form-control @error('leaving') is-invalid @enderror" name="leaving" value="{{ old('leaving') }}" autocomplete="leaving">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">CTC</label>
                                            <input id="ctc" type="text" class="form-control @error('ctc') is-invalid @enderror" name="ctc" value="{{ old('ctc') }}" autocomplete="ctc">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="EducationQualifications" role="tabpanel" aria-labelledby="EducationQualificationsTAB">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="">Institute</label>
                                            <input id="institute" type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" value="{{ old('institute') }}" autocomplete="institute">
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="">Course</label>
                                            <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" autocomplete="course">
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="">Passing Year</label>
                                            <input id="year_passing" type="date" class="form-control @error('year_passing') is-invalid @enderror" name="year_passing" value="{{ old('year_passing') }}" autocomplete="year_passing">
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="">Percentage</label>
                                            <input id="percentage" type="text" class="form-control @error('percentage') is-invalid @enderror" name="percentage" value="{{ old('percentage') }}" autocomplete="percentage">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="FamilyMembers" role="tabpanel" aria-labelledby="FamilyMembersTAB">
                                    <div class="row">
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="">Name</label>
                                            <input id="member_name" type="text" class="form-control @error('member_name') is-invalid @enderror" name="member_name" value="{{ old('member_name') }}" autocomplete="member_name">
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="">Course</label>
                                            <input id="relation" type="text" class="form-control @error('relation') is-invalid @enderror" name="relation" value="{{ old('relation') }}" autocomplete="relation">
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="">Passing Year</label>
                                            <input id="member_phone" type="date" class="form-control @error('member_phone') is-invalid @enderror" name="member_phone" value="{{ old('member_phone') }}" autocomplete="member_phone">
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="">Remove</label><br>
                                            <button type="button" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="float-end btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

