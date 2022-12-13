<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(){
        $tasks=Tasks::all();
        if($tasks){
            return view('todo')->with('tasks',$tasks);
        }
    }
    public function create(Request $request){
        $data=new Tasks();
        $data->detail=$request->detail;
        $data->status=$request->status;
        if($data->save()){
            return redirect('todo')->with('message','Todo created successfully');
        }
        return back();
    }
    
}
