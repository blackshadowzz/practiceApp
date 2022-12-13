@extends('layouts.master')
@section('title', 'Update Employee')
@section('content')
          <div class="container">
               <div>
                    <h3>Update Employee Form</h3>
               </div>
               <hr style="color:black;">
               <div>
                    <form action="/employees/{{$emp->id}}" method="post" class="" enctype="multipart/form-data">
                         @csrf
                         @method('put')
                    <div class="row">
                         <div class="col-8">
                         <!-- h -->
                         <div class="">
                              <label for="" class="form-label">First Name</label>
                              <input type="text" value="{{$emp->fname}}" name="fname" class="form-control flex-col" id="fname" required placeholder="First name...">
                              @error('fname')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="mt-2">
                              <label for="" class="form-label">Last Name</label>
                              <input type="text" value="{{$emp->lname}}" name="lname" class="form-control flex-col" id="lname" required placeholder="Last name...">
                              @error('lname')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
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
                                   <option value="{{$emp->depId}}" style="display: none;">{{ $emp->department->name }}</option>
                                   @foreach($deps as $dep)
                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                   @endforeach
                                   @error('depId')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror

                              </select>
                         
                         </div>
                         </div>
                         <div class="col-4 mt-4">
                              <div class="row">
                                   <div class="col-12">
                                        <img src="/storage/employees/profile/{{ $emp->image_path }}" width="75%"  alt="profile" id="profile">
                                   </div>
                                   <input type="file" name="photo" accept="image/*" class="mt-2 form-control">
                              </div>
                         </div>
                    </div>
                         <button type="submit" onclick="return confirm('Do want to update this record?');" style="float: right" class="btn btn-primary mt-3">Update Now</button>
                         <a href="/employees" class="btn btn-info mt-3">Cancel</a>
                         
                    </form>
               </div>
          </div>
          <script>
               let profile= document.querySelector('input[type=file]');
               profile.addEventListener("change",function(e){
                    var img = document.querySelector('#profile');
                    img.setAttribute("src",window.URL.createObjectURL(e.target.files[0]));
                    img.setAttribute("style", "display.block;width:100%;height:310px;object-fit:fill;");
                    output.onload = function(){
                         URL.revokeObjectURL(output.src)
                    }

               });
          </script>
@endsection