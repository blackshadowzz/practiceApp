@extends('Layouts.master')
@section('title','create')
@section('content')
     <div class="container">
          <form action="/products" method="post">
          @csrf
               <div>
                   <label for="">Title</label> 
                   <input type="text" class="form-control" name="title" >
               </div>
               <div>
                   <label for="">Cost</label> 
                   <input type="number" class="form-control" name="cost" >
               </div>
               <div>
                   <label for="">Asset</label> 
                   <input type="number" class="form-control" name="asset" >
               </div>
               <div>
                   <label for="">Description</label> 
                   <input type="text" class="form-control" name="description" >
               </div>
               
               <div class="d-flex justify-content-end mt-3" >
                    <button type="submit" class="btn btn-primary mr-3">Add New</button>
                    <a href="/products" class="btn btn-outline-info">Back To List</a>
               </div>
          </form>
     </div>
@endsection