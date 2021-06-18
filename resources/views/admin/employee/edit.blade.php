@extends('layouts.admin')

@section('title', 'Edit Employee')

@section('content')

<div class="modal fade" id="ExperienceFORMModal" tabindex="-1" aria-labelledby="ExperienceFORMModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title me-5" id="ExperienceFORMModalLabel">Add Experience</h5>
            <button type="button" class="btn btn-success float-end add-ExperienceFORM">Add More</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/add-emp-experience/'.$userEmp->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="ExperienceFORM card-body mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Company</label>
                                <input type="text" name="company[]" class="form-control" value="" required autocomplete="company">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Job Role (Designation)</label>
                                <input type="text" name="company_designation[]" class="form-control" value="" required autocomplete="company_designation">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Joining Date</label>
                                <input type="date" name="joining[]" class="form-control" value="" required autocomplete="joining">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Leaving Date</label>
                                <input type="date" name="leaving[]" class="form-control" value="" required autocomplete="leaving">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">CTC</label>
                                <input type="text" name="ctc[]" class="form-control" value="" autocomplete="ctc">
                            </div>
                        </div>
                    </div>
                    <div class="ExperienceNewFORM"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>


<div class="modal fade" id="QualificationFORMModal" tabindex="-1" aria-labelledby="QualificationFORMModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title me-5" id="QualificationFORMModalLabel">Add Qualification</h5>
            <button type="button" class="btn btn-success float-end add-QualificationFORM">Add More</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/add-emp-qualification/'.$userEmp->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="QualificationFORM card-body mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Institute *</label>
                                <input type="text" class="form-control" required name="institute[]" autocomplete="institute">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="">Course *</label>
                                <input type="text" class="form-control" required name="course[]" autocomplete="course">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Passing Year *</label>
                                <input type="date" class="form-control" required name="year_passing[]" autocomplete="year_passing">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Percentage</label>
                                <input type="text" class="form-control" name="percentage[]" autocomplete="percentage">
                            </div>
                        </div>
                    </div>
                    <div class="QualificationNewFORM"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>


<div class="modal fade" id="FamilymemberFORMModal" tabindex="-1" aria-labelledby="FamilymemberFORMModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title me-5" id="FamilymemberFORMModalLabel">Add Family Member</h5>
            <button type="button" class="ms-5 btn btn-success float-end add-FamilymemberFORM">Add More</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/add-emp-familymember/'.$userEmp->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="FamilymemberFORM card-body mt-3 border-bottom">
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Member Name</label>
                                <input type="text" class="form-control" name="member_name[]" required />
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Relation</label>
                                <input type="text" class="form-control" name="relation[]" required />
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="">Member Phone No</label>
                                <input type="text" class="form-control" name="member_phone[]" required />
                            </div>
                        </div>
                    </div>
                    <div class="FamilymemberNewFORM"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>

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
                        <h4>Edit Employee
                            <a href="{{ url('admin/view-employee') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/employee-update/'.$userEmp->id) }}" method="POST">
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')  == true ? '': $userEmp->email }}" autocomplete="email">
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
                                            <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation')  == true ? '': $emp_detail->designation }}" autocomplete="designation">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Salary</label>
                                            <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary')  == true ? '': $emp_detail->salary }}" autocomplete="salary">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Martial Status</label>
                                            <select name="marital_status" class="form-control">
                                                <option value="">--Select Marital--</option>
                                                <option value="Single" {{ $emp_detail->marital_status == 'Single' ? 'selected':'' }}>Single</option>
                                                <option value="Married" {{ $emp_detail->marital_status == 'Married' ? 'selected':'' }}>Married</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Date of Birth</label>
                                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') == true ? '': $emp_detail->dob }}" autocomplete="dob">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="">Phone Number</label>
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') == true ? '': $emp_detail->phone }}" autocomplete="phone">
                                        </div>
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="">Address</label>
                                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3" autocomplete="address">{{ old('address') == true ? '': $emp_detail->address }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <strong>Role:</strong>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="PreviousExperience" role="tabpanel" aria-labelledby="PreviousExperienceTAB">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Experience
                                                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#ExperienceFORMModal">Add More</button>
                                            </h5>
                                        </div>
                                        @foreach ($emp_experience as $expe_item)
                                        <div class="card-body mt-3 border-bottom">
                                            <input type="hidden" name="experience_id[]" value="{{$expe_item->id}}">
                                            <div class="row">
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Company</label>
                                                    <input type="text" name="company[]" class="form-control" value="{{$expe_item->company}}" autocomplete="company">
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Job Role (Designation)</label>
                                                    <input type="text" name="company_designation[]" class="form-control" value="{{$expe_item->designation}}"  autocomplete="company_designation">
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Joining Date</label>
                                                    <input type="date" name="joining[]" class="form-control" value="{{$expe_item->joining}}"  autocomplete="joining">
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Leaving Date</label>
                                                    <input type="date" name="leaving[]" class="form-control" value="{{$expe_item->leaving}}"  autocomplete="leaving">
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">CTC</label>
                                                    <input type="text" name="ctc[]" class="form-control" value="{{$expe_item->ctc}}"  autocomplete="ctc">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <br>
                                                        <a href="{{ url('admin/experince-delete/'.$expe_item->id.'/'.$userEmp->id) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="EducationQualifications" role="tabpanel" aria-labelledby="EducationQualificationsTAB">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Education Qualification
                                                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#QualificationFORMModal">Add More</button>
                                            </h5>
                                        </div>
                                        @foreach ($emp_qualification as $quali_item)
                                        <div class="card-body mt-3 border-bottom">
                                            <div class="row">
                                                <input type="hidden" name="qualification_id[]" value="{{$quali_item->id}}">
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="">Institute</label>
                                                    <input type="text" class="form-control" name="institute[]" value="{{$quali_item->institute}}" />
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <label for="">Course</label>
                                                    <input type="text" class="form-control" name="course[]" value="{{$quali_item->course}}" />
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Passing Year</label>
                                                    <input type="date" class="form-control" name="year_passing[]" value="{{$quali_item->year_passing}}" />
                                                </div>
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="">Percentage</label>
                                                    <input type="text" class="form-control" name="percentage[]" value="{{$quali_item->percentage}}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <br>
                                                        <a href="{{ url('admin/qualification-delete/'.$quali_item->id.'/'.$userEmp->id) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane card-body border fade" id="FamilyMembers" role="tabpanel" aria-labelledby="FamilyMembersTAB">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Family Member
                                                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#FamilymemberFORMModal">Add More</button>
                                            </h5>
                                        </div>
                                        @foreach ($emp_familymember as $member_item)
                                        <div class="card-body mt-3 border-bottom">
                                            <div class="row">
                                                <input type="hidden" name="familymember_id[]" value="{{$member_item->id}}">
                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="">Member Name</label>
                                                    <input type="text" class="form-control" name="member_name[]" value="{{$member_item->name}}" />
                                                </div>
                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="">Relation</label>
                                                    <input type="text" class="form-control" name="relation[]" value="{{$member_item->relation}}" />
                                                </div>
                                                <div class="col-md-3 form-group mb-3">
                                                    <label for="">Member Phone No</label>
                                                    <input type="text" class="form-control" name="member_phone[]" value="{{$member_item->phone}}" />
                                                </div>
                                                <div class="col-md-3 form-group mb-3">
                                                    <br>
                                                    <a href="{{ url('admin/familymember-delete/'.$member_item->id.'/'.$userEmp->id) }}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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

@section('scripts')

<script>
    $(document).ready(function () {

        $(document).on('click', '.remove-ExperienceNewFORM', function () {
            $(this).closest('.ExperienceFORM').remove();
        });
        $(document).on('click', '.remove-QualificationNewFORM', function () {
            $(this).closest('.QualificationFORM').remove();
        });
        $(document).on('click', '.remove-FamilymemberNewFORM', function () {
            $(this).closest('.FamilymemberFORM').remove();
        });

        $(document).on('click', '.add-ExperienceFORM', function () {
            $('.ExperienceNewFORM').append('<div class="ExperienceFORM card-body mt-3 border-bottom">\
                    <div class="row">\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Company</label>\
                            <input type="text" name="company[]" class="form-control" value="" required autocomplete="company">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Job Role (Designation)</label>\
                            <input type="text" name="company_designation[]" class="form-control" value="" required autocomplete="company_designation">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Joining Date</label>\
                            <input type="date" name="joining[]" class="form-control" value="" required autocomplete="joining">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Leaving Date</label>\
                            <input type="date" name="leaving[]" class="form-control" value="" required autocomplete="leaving">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">CTC</label>\
                            <input type="text" name="ctc[]" class="form-control" value="" autocomplete="ctc">\
                        </div>\
                        <div class="col-md-4">\
                            <div class="form-group mb-2">\
                                <br>\
                                <button type="button" class="remove-ExperienceNewFORM btn btn-danger">Remove</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            ');
        });

        $(document).on('click', '.add-QualificationFORM', function () {
            $('.QualificationNewFORM').append('<div class="QualificationFORM card-body mt-3 border-bottom">\
                    <div class="row">\
                        <div class="col-md-6 form-group mb-3">\
                            <label for="">Institute</label>\
                            <input type="text" class="form-control" name="institute[]" required autocomplete="institute">\
                        </div>\
                        <div class="col-md-6 form-group mb-3">\
                            <label for="">Course</label>\
                            <input type="text" class="form-control" name="course[]" required autocomplete="course">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Passing Year</label>\
                            <input type="date" class="form-control" name="year_passing[]" required autocomplete="year_passing">\
                        </div>\
                        <div class="col-md-4 form-group mb-3">\
                            <label for="">Percentage</label>\
                            <input type="text" class="form-control" name="percentage[]" autocomplete="percentage">\
                        </div>\
                        <div class="col-md-4">\
                            <div class="form-group mb-2">\
                                <br>\
                                <button type="button" class="remove-QualificationNewFORM btn btn-danger">Remove</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            ');
        });

        $(document).on('click', '.add-FamilymemberFORM', function () {
            $('.FamilymemberNewFORM').append('<div class="FamilymemberFORM card-body mt-3 border-bottom">\
                    <div class="row">\
                        <div class="col-md-3 form-group mb-3">\
                            <label for="">Member Name</label>\
                            <input type="text" class="form-control" name="member_name[]" required />\
                        </div>\
                        <div class="col-md-3 form-group mb-3">\
                            <label for="">Relation</label>\
                            <input type="text" class="form-control" name="relation[]" required />\
                        </div>\
                        <div class="col-md-3 form-group mb-3">\
                            <label for="">Member Phone No</label>\
                            <input type="text" class="form-control" name="member_phone[]" required />\
                        </div>\
                        <div class="col-md-3 form-group mb-2">\
                            <br>\
                            <button type="button" class="remove-FamilymemberNewFORM btn btn-danger">Remove</button>\
                        </div>\
                    </div>\
                </div>\
            ');
        });

    });
</script>

@endsection

