<?php

namespace App\Http\Controllers;

use App\Models\Workfive;
use Illuminate\Http\Request;

class FormValidate extends Controller
{
    public function index(){
        return view('validations.index');
    }
    public function create(){
        $data=Workfive::all();
        return view('validations.create',compact('data'));
    }
    public function store(Request $re){
        $re->validate([
            'name' =>'required|min:3|unique:workfives,name',
            'email' =>'required|email|unique:workfives,email',
            'password' =>'required|confirmed|min:3'
        ]);

        $data=new Workfive();
        $data->name = $re->name;
        $data->email = $re->email;
        $data->password = $re->password;
        if($data->save()){
            return redirect('validations/create');
        }
    }
}
