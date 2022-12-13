@extends('Layouts.master')
@section('title','Editting')
@section('content')
     <div class="container">
          <form action="/products/{{ $pro->product_id }}" method="post">
          @csrf
          @method('put')
               <div>
                   <label for="">Title</label> 
                   <input type="text" class="form-control" value="{{ $pro->title }}" name="title" >
               </div>
               <div>
                   <label for="">Cost</label> 
                   <input type="number" class="form-control" value="{{ $pro->cost }}" name="cost" >
               </div>
               <div>
                   <label for="">Asset</label> 
                   <input type="number" class="form-control" value="{{ $pro->asset }}" name="asset" >
               </div>
               <div>
                   <label for="">Description</label> 
                   <input type="text" class="form-control" value="{{ $pro->description }}" name="description" >
               </div>
               
               <div class="d-flex justify-content-end mt-3" >
                    <button type="submit" class="btn btn-primary mr-3">Update Now</button>
                    <a href="/products" class="btn btn-outline-info">Back To List</a>
               </div>
          </form>
     </div>
@endsection