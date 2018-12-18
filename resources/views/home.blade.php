@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <h1>Dashboard!</h1>
    </div>
@stop

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
        @endif

        <div>
            <a href="{{ route('companies.create') }}" class="btn btn-success">Create company</a>
            <a href="{{ route('companies.index') }}" class="btn btn-default">All companies</a>
        </div>
        <br>
        <div>
            <a href="{{ route('employees.create') }}" class="btn btn-success">Create employee</a>
            <a href="{{ route('employees.index') }}" class="btn btn-default">All employees</a>
        </div>
    </div>
@stop