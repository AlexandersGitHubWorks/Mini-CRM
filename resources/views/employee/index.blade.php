@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Company</td>
                <td>email</td>
                <td>Phone</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>@foreach($companies as $company)
                            {{ $company->id == $employee->company ? $company->name : '' }}
                        @endforeach
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td><a href="{{ action('EmployeeController@edit', $employee->id) }}" class="btn btn-primary">Edit</a></td>
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
@endsection