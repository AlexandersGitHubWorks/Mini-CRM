@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <a href="{{ url('/create/company') }}" class="btn btn-success">Create company</a>
            <a href="{{ url('/companies') }}" class="btn btn-default">All companies</a>
        </div>
        <br>
        <div class="row">
            <a href="{{ url('/create/employee') }}" class="btn btn-success">Create employee</a>
            <a href="{{ url('/employees') }}" class="btn btn-default">All employees</a>
        </div>
    </div>
@endsection