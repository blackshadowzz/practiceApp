<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        // if($re->is('photos')){
        //     echo "photos";
        //     echo "<br/>";
        // }
        // if($re->isMethod("GET")){
        //     echo "Get";
        // }
        return view('photos.create');
        // dd(
        //     $re->path(),
        //     $re->url(),
        //     $re->fullUrl()
        // );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $re)
    {
        echo $re->input('name');
        echo "<br/>";
        echo $re->input('email');
        echo "<br/>";
        echo $re->name;
        echo "<br/>";
        echo $re->email;
        echo "<br/>";
        print_r($re->only('name','email'));
        echo "<br/>";
        print_r($re->except('name'));
        echo "<br/>";
        echo '<pre>';
        print_r($re->all());
        echo '</pre>';


        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
