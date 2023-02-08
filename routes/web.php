<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Table;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/employe/create', [EmployeeController::class, 'store']);
Route::get('employe/list', [EmployeeController::class, 'index']);
Route::get('edit_student/{id}', [EmployeeController::class, 'edit']);
Route::put('update_emplye', [EmployeeController::class, 'update']);
Route::delete('delete/{id}', [EmployeeController::class, 'destroy']);
// Route::get('/table', [Table::class, 'show']);
// Route::view('/tableone', 'table');
