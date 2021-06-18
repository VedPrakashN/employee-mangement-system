@extends('layouts.admin')


@section('title', '| Edit Permission')

@section('content')

<div class="row">
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4>
                    <i class="fa fa-key me-2"></i> Edit {{$permission->name}}
                    <a href="{{ url('admin/permissions') }}" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                <div class="form-group">
                    {{ Form::label('name', 'Permission Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

@endsection
