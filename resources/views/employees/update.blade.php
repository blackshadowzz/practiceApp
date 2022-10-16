@extends('layouts.master')
@section('title', 'Update Employee')
@section('content')
          <div class="container mt-5">
               <div>
                    <h3>Update Employee Form</h3>
               </div>
               <div>
                    <form action="/employees/{{$emp->id}}" method="post" class="">
                         @csrf
                         @method('put')
                    <div class="row">
                         <!-- h -->
                         <div class="">
                              <label for="" class="form-label">First Name</label>
                              <input type="text" value="{{$emp->fname}}" name="fname" class="form-control flex-col" id="fname" required placeholder="First name...">
                              
                         </div>
                         <div class="mt-2">
                              <label for="" class="form-label">Last Name</label>
                              <input type="text" value="{{$emp->lname}}" name="lname" class="form-control flex-col" id="lname" required placeholder="Last name...">
                              
                         </div>
                         <div class="mt-2">
                              <label for="" class="form-label">Email</label>
                              <input type="email" value="{{$emp->email}}" name="email" class="form-control flex-col" id="email" required placeholder="Email...">
                              
                         </div>
                         <div class="mt-2">
                              <label for="" class="form-label">Phone</label>
                              <input type="text" value="{{$emp->phone}}" name="phone" class="form-control flex-col" id="phone" required placeholder="Phone...">
                              
                         </div>
                         <div class="mt-2">
                              <label for="depId" class="form-label">Department</label>
                              <select name="depId" id="" class="form-control">
                                   <option value="{{$emp->depId}}" style="display: none;">{{$emp->depId}}</option>
                                   <option value="IT">IT</option>
                                   <option value="Marketing">Marketing</option>

                              </select>
                         
                         </div>
                    </div>
                         <button type="submit" onclick="return confirm('Do want to update this record?');" style="float: right" class="btn btn-primary mt-3">Update Now</button>
                         <a href="/employees" class="btn btn-info mt-3">Cancel</a>
                         
                    </form>
               </div>
          </div>
@endsection