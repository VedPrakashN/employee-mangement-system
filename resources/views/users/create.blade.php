@extends('layouts.admin')

@section('title', '| Add User')

@section('content')

<div class="row">
    <div class="col-md-12">

        @if (count($errors) > 0)
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
                <h4>
                    <i class='fa fa-user-plus'></i> Add User
                    <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group mb-3">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control'))
                        !!}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
                        'form-control')) !!}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
