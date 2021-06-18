@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12 mt-4">

        <div class="card">
            <div class="card-header">
                <h4>
                    <i class='fa fa-user-plus'></i> Edit {{$user->name}}
                    <a href="{{ url('admin/users') }}" class="btn btn-success float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                <div class="form-group border mb-3 p-3">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
                <div class="form-group border mb-3 p-3">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
                <div class="form-group border mb-3 p-3">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge bg-success me-2">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
