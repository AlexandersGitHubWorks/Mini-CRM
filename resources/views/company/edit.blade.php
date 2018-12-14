@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <form method="post" action="{{ action('CompanyController@update', $company->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="post">
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <label for="name">Company New Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <label for="email">Company New Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $company->email }}">
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <label for="website">Company New Website:</label>
                    <input type="text" class="form-control" name="website" value="{{ $company->website }}">
                </div>
                <div class="form-group">
                    <label for="logo">Company New Logo:</label>
                    <br>
                    <input type="file" name="logo" id="logo" value="{{ asset('storage/logos/' . $company->logo) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection