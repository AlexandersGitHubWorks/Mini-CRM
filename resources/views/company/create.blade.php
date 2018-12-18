@extends('adminlte::page')

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
            <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                    <label for="name">Company Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="email">Company Email:</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="website">Company Website:</label>
                    <input type="text" class="form-control" name="website"/>
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo:</label>
                    <br>
                    <input type="file" name="logo" id="logo">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@stop