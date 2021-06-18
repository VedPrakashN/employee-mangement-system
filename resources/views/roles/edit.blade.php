@extends('layouts.admin')

@section('title', '| Edit Role')

@section('content')

<div class="row">
    <div class="col-md-12 mt-4">

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
                    <i class='fa fa-user-plus'></i> Edit Role
                    <a href="{{ url('admin/roles') }}" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                    <div class="form-group mb-3">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group mb-3">
                        <strong>Permission:</strong>
                        <br />
                        @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br />
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection
