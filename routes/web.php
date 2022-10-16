<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TodoController;


// Resource 
//Route::resource('employees/{s?}',EmployeeController::class)->only(['index']);

Route::resource('employees',EmployeeController::class);
Route::resource('homeworks',HomeworkController::class);
// Route::get('employees/view/{id}',[EmpController::class,'view']);
// Route::get('employees',[EmpController::class,'index2']);

Route::resource('departments',DepartmentController::class);

Route::resource('photos', PhotoController::class);
//Controller
Route::get('home',[TodoController::class,'home']);

//Route Group
Route::prefix('home')->group(function(){
    Route::get('/sale',function(){

    })->name('sale'); //Route name
});

//Employee practice
// Route::get('home/employee/{s?}', function($s=null){
   
// });
// Route::resource('employees/{s?}',EmployeeController::class)->only(['index']);


// Route::post('home/employee/create',function( Request $re){
//     $d=$re->only(['fname','lname','email','phone','depId']);
//     if(DB::table('employee')->insert($d))
//     return redirect('home/employee');
// });

// basic route
Route::get('/', function () { //Defualt
    return view('welcome');
});


//Todo App
Route::get('home/todo/{search?}',function($search=null){
    $tasks=DB::table("tasks")->get();
    if($search!=null){
        $tasks=DB::table("tasks")->where("status",$search)->get();
    }
    // return view("todo",["tasks"=>$tasks]);
    return view("todo",compact('tasks'));
});
Route::post("home/todo/create",function(Request $req){
    $data=$req->only(['detail','status']);
    if(DB::table('tasks')->insert($data))
    return redirect("home/todo");
});
Route::get('home/todo/edit/{id}',function($id){
    if(!$id) return abort(404);
    $task=DB::table('tasks')->where('id',$id)->first();
    // $task=DB::table('tasks')->find($id);
    if($task)
        return view("todo.edit")->with("task",$task);
});
Route::put("home/todo/edit/{id}",function(Request $req,$id){
    $detail=$req->input("detail");
    $status=$req->input("status");
    $data=compact("detail","status");
    if(DB::table('tasks')->where('id',$id)->update($data));
        return redirect("home/todo");
});
Route::delete('home/todo/delete/{id}',function($id){
    if(DB::table('tasks')->where('id',$id)->delete());
        return redirect('home/todo');
});
Route::get("home/todo/view/{id}",function($id){
    if(!$id) return abort(404);
    $task=DB::table('tasks')->where('id',$id)->first();
    if($task)
        return view("todo.view")->with("task",$task);
});

// Route::get("home/todo/edit/{id}",function($id){
//     $data=DB::table('tasks')->where('id',$id)->value('status');
//     $update=$data=="done"?['status'=>'pending']:['status'=>'done'];
//     if(DB::table('tasks')->where('id',$id)->update($update));
//         return redirect('home/todo');
// });
Route::get('home/create',function(){
    return view("create");
});
// Route::post('home/todo/create',function(Request $req){
//     echo "<p style='color:red;'>Using Request Object</p>";
//     echo '1. retrieve all user inputs<br/>';
//     echo "2. retrieve all user input exept _token field<br/>";
//     echo "3. retrieve all user input base on input field<br/>";
//     dd(
        
//         $req->all(),
//         $req->except('_token'),
//         $req->only('task_detail','status')
//     );
//     return view("todo");
// });
// Route::put('home/todo/update',function(Request $req){
//     echo "<p style='color:red;'>Using Request() Method</p><br/>";
//     echo '1. retrieve all user inputs<br/>';
//     echo "2. retrieve all user input exept _token field<br/>";
//     echo "3. retrieve all user input base on input field<br/>";
//     dd(
        
//         request()->all(),
//         request()->except('_token'),
//         request()->only('task_detail','status')
//     );
//     return view("todo");
// });
// Route::post('home/todo/create',function(Request $req){
//     dd($req->all());
//     dd(request()->all());
//     return view("todo");
// });
// Route::put('home/todo/update',function(){
//     return view("todo");
// });