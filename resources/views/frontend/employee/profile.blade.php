@extends('layouts.app')

@section('title','Profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        <h6>{{session('status')}}</h6>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>My Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('employee/profile-update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Designation</label>
                                        <input type="text" name="designation" value="{{ Auth::user()->singleemployee->designation }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Salary</label>
                                        <input type="text" name="salary" value="{{ Auth::user()->singleemployee->salary }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Marital Status</label>
                                        <select name="marital_status" class="form-control">
                                            <option value="">--Select Marital--</option>
                                            <option value="Single" {{ Auth::user()->singleemployee->marital_status == 'Single' ? 'selected':'' }}>Single</option>
                                            <option value="Married" {{ Auth::user()->singleemployee->marital_status == 'Married' ? 'selected':'' }}>Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" value="{{ Auth::user()->singleemployee->dob }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->singleemployee->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ Auth::user()->singleemployee->address }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

