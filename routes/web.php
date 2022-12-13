<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FormValidate;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){
    Route::controller(TodoController::class)->group(function (){
        Route::prefix('todo')->group(function(){
            Route::get('/','index')->name('todo');
            Route::post('create','create');
        });
    });
    Route::get('validations',[FormValidate::class,'index']);
    Route::get('validations/create',[FormValidate::class,'create']);
    Route::post('validations/store',[FormValidate::class,'store']);
});
Route::controller(UserController::class)->group(function(){
    Route::prefix('users')->group(function() {
        Route::get('permissions/index','index_permission')->name('index_permission');
        Route::get('permission/create','create_permission')->name('create_permission');
        Route::post('permission/store','store_permission')->name('store_permission');
        Route::delete('permissions/{id}/delete','delete_permission')->name('delete_permission');
    });
});


Route::get('/index', function () {
    return view('index');
})->name('index_page');

Route::resource('employees',EmployeeController::class)->middleware('auth');
Route::resource('departments',DepartmentController::class)->middleware('auth');
Route::get('employee/pdf_view',[EmpController::class,'createPDF'])->middleware('auth')->name('createpdf');
Route::resource('posts',PostController::class);
Route::resource('products',ProductController::class);
