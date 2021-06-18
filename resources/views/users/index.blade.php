@extends('layouts.admin')

@section('title', '| Users')

@section('content')



<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>
                    User Management
                    <a href="{{ route('users.create') }}" class="btn btn-success float-end">Add User</a>
                </h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="btn btn-sm btn-success">{{ $v }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id], 'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{-- {!! $data->render() !!} --}}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
