<?php

use App\Http\Controllers\DepartmentController;
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
    return view('dashboard.index');
});


Route::group(['prefix' => 'department'], function () {
    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::get('/index', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::get('/destroy', [DepartmentController::class, 'destroy'])->name('department.destroy');

});
