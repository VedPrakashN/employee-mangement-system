@extends('layouts.admin')

@section('title', 'View Employee Bio data')

@section('content')

<style>
    table th{
        width: 20%;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View Employee Bio data
                        <a href="{{ url('admin/view-employee') }}" class="btn btn-danger float-end">BACK</a>
                        <a href="{{ url('admin/generate-employee-pdf/'.$user->id) }}" class="btn me-3 btn-primary float-end">Download Biodata in PDF</a>
                    </h4>
                </div>
                <div class="card-body">
                    <h5>Employee Details</h5>
                    <hr>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>FullName</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @foreach ($user->employee as $employeedetails)
                            <tr>
                                <th>Designation</th>
                                <td>{{ $employeedetails->designation }}</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td>{{ $employeedetails->salary }}</td>
                            </tr>
                            <tr>
                                <th>Marital Status</th>
                                <td>{{ $employeedetails->marital_status }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $employeedetails->dob }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $employeedetails->address }}</td>
                            </tr>
                            <tr>
                                <th>Phone No</th>
                                <td>{{ $employeedetails->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h5>Employee Qualification</h5>
                    <hr>
                    @forelse ($user->qualification as $empQualification)
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Institute</th>
                                <td>{{ $empQualification->institute }}</td>
                            </tr>
                            <tr>
                                <th>Course</th>
                                <td>{{ $empQualification->course }}</td>
                            </tr>
                            <tr>
                                <th>Passing Year</th>
                                <td>{{ $empQualification->year_passing }}</td>
                            </tr>
                            <tr>
                                <th>Percentage</th>
                                <td>{{ $empQualification->percentage }}</td>
                            </tr>

                        </tbody>
                    </table>
                    @empty
                        <h5>No Qualifications Added</h5>
                    @endforelse

                    <br>

                    <h5>Employee Family Member</h5>
                    <hr>
                    @forelse ($user->familymember as $empfamilymember)
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Member Name</th>
                                <td>{{ $empfamilymember->name }}</td>
                            </tr>
                            <tr>
                                <th>Relation</th>
                                <td>{{ $empfamilymember->relation }}</td>
                            </tr>
                            <tr>
                                <th>Member Phone No</th>
                                <td>{{ $empfamilymember->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @empty
                        <h5>No Family Members Added</h5>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
