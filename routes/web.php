<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SurgeryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
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
    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
});
Route::group(['prefix' => 'visits'], function () {
    Route::get('/create', [VisitController::class, 'create'])->name('visit.create');
    Route::get('/index', [VisitController::class, 'index'])->name('visit.index');
    Route::get('/edit/{id}', [VisitController::class, 'edit'])->name('visit.edit');
    Route::get('/destroy/{id}', [VisitController::class, 'destroy'])->name('visit.destroy');
    Route::post('/store', [VisitController::class, 'store'])->name('visit.store');
    Route::post('/update/{id}', [VisitController::class, 'update'])->name('visit.update');
});
Route::group(['prefix' => 'surgery'], function () {
    Route::get('/create', [SurgeryController::class, 'create'])->name('surgery.create');
    Route::get('/index', [SurgeryController::class, 'index'])->name('surgery.index');
    Route::get('/edit/{id}', [SurgeryController::class, 'edit'])->name('surgery.edit');
    Route::get('/destroy/{id}', [SurgeryController::class, 'destroy'])->name('surgery.destroy');
    Route::post('/store', [SurgeryController::class, 'store'])->name('surgery.store');
    Route::post('/update/{id}', [SurgeryController::class, 'update'])->name('surgery.update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
