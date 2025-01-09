<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Employee Form</title>
</head>
@extends('layouts.master')
@section('content')

<body style="margin:20px;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script><br /><br />
    <h2>Edit Form</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $myerror)
                <li style="color:red">{{$myerror}}</li>
            @endforeach
        </ul>
    @endif
    <form class="row g-3" style="width: 50%;margin:20px;" method="post"
        action="{{route('employee.update', $employeearr->id)}}">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <label for="firstname" class="form-label">FirstName</label>
            <input type="text" class="form-control" value="{{$employeearr->emp_firstname}}" name="emp_firstname">
        </div>
        <div class="col-md-6">
            <label for="lastname" class="form-label">LastName</label>
            <input type="text" class="form-control" id="emp_lastname" value="{{$employeearr->emp_lastname}}"
                name="emp_lastname">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="emp_email" value="{{$employeearr->emp_email}}"
                name="emp_email">
        </div>
        <div class="col-md-6">
            <label for="dob" class="form-label">DOB</label>
            <input type="date" class="form-control" id="emp_dob" value="{{$employeearr->emp_dob}}" name="emp_dob">
        </div>
        <div class="col-md-6">
            <label for="number" class="form-label">Mobile No</label>
            <input type="number" class="form-control" id="emp_mobile" value="{{$employeearr->emp_mobile}}"
                name="emp_mobile">
        </div>
        <div class="col-md-6">
            <label for="joining" class="form-label">Date of Joining</label>
            <input type="date" class="form-control" id="emp_joining" value="{{$employeearr->emp_joining}}"
                name="emp_joining">
        </div>
        <div class="col-sm-7">
            <input class="btn btn-primary" type="submit">
        </div>
        </div>

    </form>
</body>

@endsection

</html>