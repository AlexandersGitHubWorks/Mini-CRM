@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Website</td>
                <td>Logo</td>
                <td colspan="2">Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('/storage/logos/' . $company->logo) }}" style="width: 35px;">
                        @endif
                    </td>
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
@endsection