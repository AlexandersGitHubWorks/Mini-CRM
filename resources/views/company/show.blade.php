@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <h1>{{ $company->name }}</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <p><img src="{{ asset('storage/logos/' . $company->logo) }}"></p>
        <p>Email: {{ $company->email }}</p>
        <p>Website: {{ $company->website }}</p>
        <p><a href="{{ action('CompanyController@edit', $company->id) }}" class="btn btn-primary">Edit</a></p>
        <div>
            <form action="{{ action('CompanyController@destroy', $company->id) }}" method="post">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    <div>
@stop