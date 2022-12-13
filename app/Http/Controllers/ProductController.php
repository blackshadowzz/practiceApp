<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $pro=DB::table('products')->get();
        $pro2=DB::table('products')->get(['title','cost']);
        $pro3=DB::table('products')->where('product_id',2)->first();
        return view('products.index',compact('pro','pro2','pro3'));

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $pro=$request->except(['_token']);
        if(DB::table('products')->insert($pro)){
            return redirect('products');
        }
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $pro=DB::table('products')->where('product_id',$id)->first();
        return view('products.edit',compact('pro'));
    }
    public function update(Request $request, $id)
    {
        $pro=$request->except(['_token','_method','product_id']);
        if(DB::table('products')->where('product_id',$id)->update($pro)){
            return redirect('products');
        }
    }
    public function destroy($id)
    {
        
        if(DB::table('products')->where('product_id',$id)->delete()){
            return redirect('products');
        }
    }
}
