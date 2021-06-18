@extends('layouts.admin')

@section('title', 'View Employee')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Employee</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('employee-store') }}" method="POST" class="row">
                        @csrf

                        
                        <h4>Previous Experience</h4>
                        <hr>
                        <div class="col-md-4 form-group mb-3">
                            <label for="">Company</label>
                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="">Job Role (Designation)</label>
                            <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="">Joining Date</label>
                            <input id="joining" type="date" class="form-control @error('joining') is-invalid @enderror" name="joining" value="{{ old('joining') }}" required autocomplete="joining">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="">Leaving Date</label>
                            <input id="leaving" type="date" class="form-control @error('leaving') is-invalid @enderror" name="leaving" value="{{ old('leaving') }}" required autocomplete="leaving">
                        </div>
                        <div class="col-md-4 form-group mb-3">
                            <label for="">CTC</label>
                            <input id="ctc" type="text" class="form-control @error('ctc') is-invalid @enderror" name="ctc" value="{{ old('ctc') }}" required autocomplete="ctc">
                        </div>

                        <h4>Education Qualifications</h4>
                        <hr>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Institute</label>
                            <input id="institute" type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" value="{{ old('institute') }}" required autocomplete="institute">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Course</label>
                            <input id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" required autocomplete="course">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Passing Year</label>
                            <input id="year_passing" type="date" class="form-control @error('year_passing') is-invalid @enderror" name="year_passing" value="{{ old('year_passing') }}" required autocomplete="year_passing">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="">Percentage</label>
                            <input id="percentage" type="text" class="form-control @error('percentage') is-invalid @enderror" name="percentage" value="{{ old('percentage') }}" required autocomplete="percentage">
                        </div>

                        <h4>Family Members</h4>
                        <hr>
                        <div class="col-md-3 form-group mb-3">
                            <label for="">Name</label>
                            <input id="member_name" type="text" class="form-control @error('member_name') is-invalid @enderror" name="member_name" value="{{ old('member_name') }}" required autocomplete="member_name">
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="">Course</label>
                            <input id="relation" type="text" class="form-control @error('relation') is-invalid @enderror" name="relation" value="{{ old('relation') }}" required autocomplete="relation">
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="">Passing Year</label>
                            <input id="member_phone" type="date" class="form-control @error('member_phone') is-invalid @enderror" name="member_phone" value="{{ old('member_phone') }}" required autocomplete="member_phone">
                        </div>
                        <div class="col-md-3 form-group mb-3">
                            <label for="">Remove</label><br>
                            <button type="button" class="btn btn-danger">Remove</button>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

