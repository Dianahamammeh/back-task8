<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        foreach ($employees as $key => $employee) {
            Log::debug($employee->full_name);
        }
        return response()->json([
            'status' => 'success',
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'departmentId' => $this->department_id,
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create([
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'countryId' => $this->country_id,
            'stateId' => $this->state_id,
            'departmentId' => $this->department_id,
            'birthDate' => $this->birth_date,
            'dateHired' => $this->date_hired,

        ]);

        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employees = $employee->update([
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'address' => $this->address,
            'countryId' => $this->country_id,
            'stateId' => $this->state_id,
            'departmentId' => $this->department_id,
            'birthDate' => $this->birth_date,
            'dateHired' => $this->date_hired,
        ]);
        // $project->employees()->sync($request->employee_id);

        return response()->json([
            'status' => 'success',
            'employee' => $employees,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }

    public function showTrashedEmployee()
    {
        $employee = Employee::withTrashed()->get();
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }

    public function forceDelete(String $id){
        $employee = Employee::where('id', $id)->forceDelete();
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }

    public function restoe(Employee $employee)
    {
        $employee->restoe();
        return response()->json([
            'status' => 'success',
            'employee' => $employee,
        ]);
    }}
