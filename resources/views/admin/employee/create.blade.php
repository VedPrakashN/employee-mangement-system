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
                        <h4>Add Employee
                            <a href="{{ url('admin/view-employee') }}" class="btn btn-primary float-end">View Employee</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/employee-store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 form-group mb-3">
                                    <label for="">Full Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
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
                                    <label for="">Salary</label>
                                    <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" autocomplete="salary">
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
                                <div class="form-group mb-3">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
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

