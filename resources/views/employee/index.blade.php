@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <h1>All Employees</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{!!  $employee->company()->first() ? $employee->company()->first()->name : '<span class="badge badge-secondary">Unemployed</span>' !!}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td><a href="{{ action('EmployeeController@show', $employee->id) }}"
                           class="btn btn-primary">View</a></td>
                    <td><a href="{{ action('EmployeeController@edit', $employee->id) }}"
                           class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ action('EmployeeController@destroy', $employee->id) }}" method="post">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $employees->links() }}
    <div>
@stop