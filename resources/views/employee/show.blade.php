@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>
        <p>Email: {{ $employee->email }}</p>
        <p>Phone: {{ $employee->phone }}</p>
        <p><a href="{{ action('EmployeeController@edit', $employee->id) }}" class="btn btn-primary">Edit</a></p>
        <div>
            <form action="{{ action('EmployeeController@destroy', $employee->id) }}" method="post">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        <div>
@endsection