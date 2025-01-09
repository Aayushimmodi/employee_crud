<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeearray = employee::all();

        return view("employee.index", compact('employeearray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_firstname' => 'required',
            'emp_lastname' => 'required',
            'emp_mobile' => 'required|numeric',
            'emp_email' => 'required|email|unique:employees,emp_email',
            'emp_dob' => 'required',
            'emp_joining' => 'required'
        ]);

        // $lastEmployee = Employee::latest('id')->first();
        // //Log::info('Last Employee:', [$lastEmployee]);
        // $employeeId = 'EE-' . str_pad(($lastEmployee ? $lastEmployee->id + 1 : 1), 3, '0', STR_PAD_LEFT);

        // //Log::info('Generated Employee ID:', [$employeeId]);
        // Employee::create([
        //     'employee_id' => $employeeId,
        //     'emp_firstname' => $request->get('emp_firstname'),
        //     'emp_lastname' => $request->get('emp_lastname'),
        //     'emp_mobile' => $request->get('emp_mobile'),
        //     'emp_email' => $request->get('emp_email'),
        //     'emp_dob' => $request->get('emp_dob'),
        //     'emp_joining' => $request->get('emp_joining'),
        // ]);


        $employeeq = new employee([
            'emp_firstname' => $request->get('emp_firstname'),
            'emp_lastname' => $request->get('emp_lastname'),
            'emp_mobile' => $request->get('emp_mobile'),
            'emp_email' => $request->get('emp_email'),
            'emp_dob' => $request->get('emp_dob'),
            'emp_joining' => $request->get('emp_joining')
        ]);
        $employeeq->save();
        return redirect('employee')->with('success', 'Employee Added.');
        //return redirect()->route('employees.index')->with('success', 'Employee added with ID: ' . $employeeId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employeearr = employee::find($id);
        return view('employee.edit', compact('employeearr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'emp_firstname' => 'required',
            'emp_lastname' => 'required',
            'emp_mobile' => 'required|integer',
            'emp_email' => 'required',
            'emp_dob' => 'required',
            'emp_joining' => 'required'
        ]);
        $employeearrq = employee::find($id);
        $employeearrq->emp_firstname = $request->get('emp_firstname');
        $employeearrq->emp_lastname = $request->get('emp_lastname');
        $employeearrq->emp_mobile = $request->get('emp_mobile');
        $employeearrq->emp_email = $request->get('emp_email');
        $employeearrq->emp_dob = $request->get('emp_dob');
        $employeearrq->emp_joining = $request->get('emp_joining');
        $employeearrq->save();
        return redirect('employee')->with('success', 'Employee Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect('employee')->with('success', 'Employee Deleted.');
    }
}
