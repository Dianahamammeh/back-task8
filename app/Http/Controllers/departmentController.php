<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = department::all();
        return response()->json([
            'status' => 'success',
            'department' => $department,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department = department::create([
            'name' => $request->name,
            
        ]);
        // $project->employees()->attach($request->employee_id);

        return response()->json([
            'status' => 'success',
            'department' => $department,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(department $department)
    {
        return response()->json([
            'status' => 'success',
            'employee' => $department,
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        $departments = $department->update([
            'name' => $request->name,
        ]);
        // $project->employees()->sync($request->employee_id);

        return response()->json([
            'status' => 'success',
            'department' => $departments,
        ]);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(department $department)
    {
        $department->delete();
        return response()->json([
            'status' => 'success',
            'department' => $department,
        ]);    
    }
    public function showTrashedDepartment(){
        $department = Department::withTrashed()->get();
        return response()->json([
            'status' => 'success',
            'department' => $department,
        ]);
    }
    public function forceDelete(String $id){
        $department = Department::where('id', $id)->forceDelete();
        return response()->json([
            'status' => 'success',
            'department' => $department,
        ]);
    }

    public function restore(department $department)
    {
    $department->restoe();
    return response()->json([
        'status' => 'success',
        'department' => $department,
    ]);}
}
