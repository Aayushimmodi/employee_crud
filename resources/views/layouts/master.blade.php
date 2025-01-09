<!DOCTYPE html>
<html lang="en">

<body>
    <center class="navbar navbar-expand-lg bg-body-tertiary">
        <h1>Employee Crud Operation in Laravel</h1>
        <hr />
    </center>
    <a href="{{route('employee.create')}}">Add</a> |
    <a href="{{route('employee.index')}}">Display</a>
    @yield('content')

</body>

</html>