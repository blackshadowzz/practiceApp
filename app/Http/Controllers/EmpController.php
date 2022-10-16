<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpController extends Controller
{
    public function view($id){
        $emp=DB::table('employee')->where('id',$id)->first();
        if($emp){
            return view('employees.view')->with('emp',$emp);
        }
    }
    public function index2(){
        
    }
}
