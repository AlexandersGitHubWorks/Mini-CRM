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
            <form method="post" action="{{ route('employees.store' ) }}">
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="first_name">Employee First Name:</label>
                    <input type="text" class="form-control" name="first_name"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Employee Last Name:</label>
                    <input type="text" class="form-control" name="last_name"/>
                </div>
                <div class="form-group">
                    <label for="company">Employee Company:</label>
                    <select class="form-control" name="company" id="company">
                        <option selected value>Choose Company...</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Employee Email:</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="phone">Employee Phone:</label>
                    <input type="tel" class="form-control" name="phone"/>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection