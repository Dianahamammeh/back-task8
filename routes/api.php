<?php

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Resources\EmployeeResource;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\departmentController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
}); 


 /*Route::get('\employees' , function(){

    $employees = Employee::orderBy('last_name')->get();

    return EmployeeResource::collection($employees);
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', function () {
    $employees = Employee::orderBy('last_name', 'DESC')->get();

    return EmployeeResource::collection($employees);
});


/*Route::apiResource('employee',EmployeeController::class);
Route::apiResource('department',departmentController::class);
Route::get('employeetrashed',[EmployeeController::class],'showTrashedEmployee');
Route::delete('forceDelete/{id}',[EmployeeController::class],'forceDelete');*/