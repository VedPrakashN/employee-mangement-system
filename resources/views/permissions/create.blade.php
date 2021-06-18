@extends('layouts.admin')

@section('title', '| Create Permission')

@section('content')

<div class="row">
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4>
                    <i class="fa fa-key me-2"></i>Add Permissions
                    <a href="{{ url('admin/permissions') }}" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                {{ Form::open(array('url' => 'admin/permissions')) }}

                <div class="form-group mb-3">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group mb-3">
                    @if(!$roles->isEmpty())
                        <h4>Assign Permission to Roles</h4>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                    @endif
                </div>
                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection
