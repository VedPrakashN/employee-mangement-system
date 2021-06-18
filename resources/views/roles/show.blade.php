@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 mt-4">

        <div class="card">
            <div class="card-header">
                <h4>
                    <i class='fa fa-user-plus'></i> Edit Role
                    <a href="{{ url('admin/roles') }}" class="btn btn-success float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                <div class="form-group border mb-3 p-3">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="form-group border mb-3 p-3">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
