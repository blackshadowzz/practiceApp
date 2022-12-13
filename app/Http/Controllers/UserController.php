<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use App\Models\Permission;
class UserController extends Controller
{
    use UserHelperTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index_permission(){
        $per=Permission::all();
        return view('users.permissions.index',compact('per'));
    }
    public function create_permission(){
        return view('users.permissions.create');
    }
    public function store_permission(Request $request){
        $this->validate($request, [
            'name' =>'required|max:100',
           'slug' =>'required|max:255',
            
        ]);
        $per=$request->except('_token');
        if(Permission::create($per)){
            return redirect('users/permissions/index')
            ->with('message','Permission record created successfully');
        }
        return back();
    }
    public function delete_permission($id){
        $per=Permission::where('id',$id);
        if($per->delete()){
            return redirect('users/permissions/index')
            ->with('message','Permission record deleted successfully');
        }
    }
}
