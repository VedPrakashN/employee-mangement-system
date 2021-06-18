@extends('layouts.admin')

@section('title', 'View Employee')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee List
                        <a href="{{ url('admin/add-employee') }}" class="btn btn-primary float-end">Add Employee</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userEmployee as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @foreach ($item->employee as $empl_details)
                                        {{$empl_details->designation}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-employee/'.$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/delete-employee/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

