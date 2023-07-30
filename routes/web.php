<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/positions', [PositionController::class, 'index'])->name('position.index');
Route::get('/positions/create', [PositionController::class, 'create'])->name('position.create');
Route::post('/positions/store', [PositionController::class, 'store'])->name('position.store');
Route::get('/positions/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
Route::put('/positions/update', [PositionController::class, 'update'])->name('position.update');
Route::delete('/positions/delete', [PositionController::class, 'destroy'])->name('position.destroy');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employees/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

