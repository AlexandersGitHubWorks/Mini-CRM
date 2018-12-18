@extends('adminlte::page')

@section('content_header')
    <div class="container">
        <h1>All Companies</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Website</th>
                <th scope="col">Logo</th>
                <th scope="col" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td><a href="{{ action('CompanyController@show', $company->id) }}">{{ $company->name }}</a></td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('/storage/logos/' . $company->logo) }}" style="width: 35px;">
                        @endif
                    </td>
                    <td><a href="{{ action('CompanyController@show', $company->id) }}" class="btn btn-primary">View</a></td>
                    <td><a href="{{ action('CompanyController@edit', $company->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ action('CompanyController@destroy', $company->id) }}" method="post">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    <div>
@stop