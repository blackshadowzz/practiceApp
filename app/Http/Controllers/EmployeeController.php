<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $emp=DB::table('employee')->get();
        if($re->query('search')){
            $emp=DB::table('employee')->where('fname','LIKE','%'.$re->query('search').'%')
            ->orwhere('lname','LIKE','%'.$re->query('search').'%')
            ->orwhere('email','LIKE','%'.$re->query('search').'%')->get();
        }

        return view('employees.employee',compact('emp'));


    }

    public function create()
    {
        $deps=department::get(['id','name']);
        return view('employees.employee',compact('deps'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $re)
    {
        $d=$re->only(['fname','lname','email','phone','depId']);
        if(DB::table('employee')->insert($d))
        return redirect('employees')->with('message','One record has been created to the system.!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::where('id',$id)->first();
        if($emp){
            return view('employees.view')->with('emp',$emp);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return abort(404);
        $emp=Employee::where('id',$id)->first();
        // $task=DB::table('tasks')->find($id);
        if($emp)
            return view("employees.update")->with("emp",$emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $fname=$req->input("fname");
        $lname=$req->input("lname");
        $email=$req->input("email");
        $phone=$req->input("phone");
        $depId=$req->input("depId");
        $data=compact("fname","lname",'email','phone','depId');
        if(Employee::where('id',$id)->update($data));
            return redirect("employees")
            ->with('message','Donw! the record has been updated.!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Employee::where('id',$id)->delete());
        return redirect('employees')
        ->with('message','One record has been delete!');
    }
}
