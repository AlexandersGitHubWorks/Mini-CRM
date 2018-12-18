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
            </div><br/>
        @endif
        <div class="row">
            <form method="post" action="{{ action('EmployeeController@update', $employee->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="first_name">Employee New Name:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="last_name">Employee New Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                </div>
                <div class="form-group">
                    <label for="company">Employee Company:</label>
                    <select class="form-control" name="company" id="company">
                        <option selected value>Choose Company...</option>
                        @foreach($companies as $company)
                            <option {{ $company->id == $employee->company ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="email">Employee New Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="phone">Employee New Website:</label>
                    <input type="tel" class="form-control" name="phone" value="{{ $employee->phone }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection