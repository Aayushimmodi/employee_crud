<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Display</title>
</head>
@extends('layouts.master')
@section('content')

<body style="margin:20px;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script><br /><br />
    @if(session()->get('success'))
        {{session()->get('sucess')}}
    @endif
    <h2>Display Data</h2>
    <table border="1" class="table" width="70%">
        <tr>
            <td><b>Id</b></td>
            <td><b>FirstName</b></td>
            <td><b>LastName</b></td>
            <td><b>Mobile No</b></td>
            <td><b>Email</b></td>
            <td><b>DOB</b></td>
            <td><b>DateOfJoining</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach ($employeearray as $employee)
            <tr>
                <td>{{$employee->custom_id}}</td>
                <td>{{$employee->emp_firstname}}</td>
                <td>{{$employee->emp_lastname}}</td>
                <td>{{$employee->emp_mobile}}</td>
                <td>{{$employee->emp_email}}</td>
                <td>{{$employee->emp_dob}}</td>
                <td>{{$employee->emp_joining}}</td>
                <td>

                    <!-- <a href="{{route('employee.destroy', $employee->id)}}">Delete</a> -->
                    <form method="post" action="{{route('employee.destroy', $employee->id)}}">
                        <a class="btn btn-primary" href="{{route('employee.edit', $employee->id)}}">Edit</a> |
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>

        @endforeach
    </table>
</body>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>