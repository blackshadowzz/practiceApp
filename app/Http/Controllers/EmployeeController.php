<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Employee;
use Dotenv\Validator;
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
        $emp=Employee::with('department')->paginate(4);

        if($re->query('search')){
            $emp=Employee::where('fname','LIKE','%'.$re->query('search').'%')
            ->orwhere('lname','LIKE','%'.$re->query('search').'%')
            ->orwhere('email','LIKE','%'.$re->query('search').'%')->with('department')->get();
        }
        // dd($emp);
        $deps=department::get(['id','name']);
        // return view('employees.employee',compact('deps'));

        return view('employees.employee',compact('emp','deps'));


    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $re)
    {
        $this->validate($re,[
            'fname'=>'required|max:100',
            'lname'=>'required|max:100',
            'depId'=>'required|integer',
            
        ]);
        $data=$re->except(['_token','photo']);
        $data['image_path']='';
        if($re->hasFile('photo') && $re->file('photo')->isValid()){
            $image=time().'.'.$re->file('photo')->getClientOriginalExtension();
            $re->file('photo')->storeAs('employees/profile',$image,'public');
            $data['image_path']=$image;
        }
        if(Employee::create($data)){
        // $d=$re->only(['fname','lname','email','phone','depId']);
        // $d['created_at']=now();
        // $d['updated_at']=now();
        //if(DB::table('employees')->insert($d))
            return redirect('employees')
                        ->with('message','One record has been created to the system.!!!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::with('department')->where('id',$id)->first();
        $deps=department::get(['id','name']);
        if($emp){
            return view('employees.view')->with(['emp'=>$emp,'dep'=>$deps]);
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
        $deps=department::get(['id','name']);
        if($emp)
            return view("employees.update")->with(["emp"=>$emp,'deps'=>$deps]);
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
        $val=Validator($req->all(),[
            'fname'=>'required|max:100',
            'lname'=>'required|max:100',
            'depId'=>'required|integer',
        ]);
        if($val->failed()) return back()->withErrors($val);
        $data=$req->except(['_token','_method','id','photo']);
        if($req->hasFile('photo') && $req->file('photo')->isValid()){
            $image=time().'.'.$req->file('photo')->getClientOriginalExtension();
            $req->file('photo')->storeAs('employees/profile',$image,'public');
            $data['image_path']=$image;
        }
        // $fname=$req->input("fname");
        // $lname=$req->input("lname");
        // $email=$req->input("email");
        // $phone=$req->input("phone");
        // $depId=$req->input("depId");
        // $data=compact("fname","lname",'email','phone','depId');
        // if(Employee::where('id',$id)->update($data));
        $r=Employee::where('id',$id)->update($data);
        if($r){
            return redirect("employees")
            ->with('message','Done! the record has been updated.!!!');
        }
        return back();
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
