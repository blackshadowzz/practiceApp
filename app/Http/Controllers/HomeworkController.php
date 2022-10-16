<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homework01.index');
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
    public function store(Request $re)//$re param from Request object
    {
        echo "<b>Personal Details</b><br/>";
        echo "<pre>";
        echo "Salutation   : ".$re->salutation."<br/>";
        echo "First Name   : ".$re->fname."<br/>";
        echo "Last Name    : ".$re->lname."<br/>";
        echo "Gender       : ".$re->gender."<br/>";
        echo "Email        : ".$re->email."<br/>";
        echo "Date of Birth: ".$re->dob."<br/>";
        echo "Address      : ".$re->address."<br/>";
        echo "</pre>";

        echo "<b>Using all() method</b>";
        echo "<pre>";
        print_r($re->all());
        echo "</pre>";
        echo "<b>Using only() method</b>";
        echo "<pre>";
        print_r($re->only('_token','email'));
        echo "</pre>";
        echo "<b>Using except() method</b>";
        echo "<pre>";
        print_r($re->except('_token','email'));
        echo "</pre>";
        //return redirect()->away('https://www.youtube.com');

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
