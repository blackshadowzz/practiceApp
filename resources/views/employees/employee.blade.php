@extends('layouts.master')
@section('title', 'Employee')
@section('content')
          <div class="mt-5">
               <h2>Hello Employee</h2>
               @if(Session::has('message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
               <div class="mb-1 mt-3">
                    <div class="row">
                         <div class="col-1">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>
                         </div>
                      <div class="col-9">
                         @foreach($emp as $em)
                         @endforeach
                         <form action="/employees" method="get">
                              <div class="input-group ">
                                   <span class="input-group-text" id="search-box">Search</span>
                                   <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
                                   <button type="submit" class="btn btn-info">Search</button>
                              </div>
                         </form>
                         
                         
                      </div>
                      <div class="col-2">
                         <div class="" style="float: right;">
                              <div class="dropdown">
                                   <button class="btn btn-md btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                           <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                                       </svg>
                                       Filter
                                   </button>
                                   <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="">IT</a></li>
                                   <li><a class="dropdown-item" href="">Marketing</a></li>
                                   <li><a class="dropdown-item" href="">Law</a></li>
                                   </ul>
                               </div>
                         </div>
                      </div>
                    </div>
               </div>
               <div>
                    <table class="table table-striped table-bordered table-hover shadow mt-3">
                         <thead class="table-dark">
                              <tr>
                                   <th>ID</th>
                                   <th>FirstName</th>
                                   <th>LastName</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>DepID</th>
                                   <th>Create At</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         @foreach($emp as $empl)

                              <tr>
                                   <td>{{$empl->id}}</td>
                                   <td>{{$empl->fname}}</td>
                                   <td>{{$empl->lname}}</td>
                                   <td>{{$empl->email}}</td>
                                   <td>{{$empl->phone}}</td>
                                   <td>{{$empl->depId}}</td>
                                   <td>{{$empl->created_at}}</td>
                                   <td>
                                        <form action="/employees/{{$empl->id}}" method="post">
                                             @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                             <a href="/employees/{{$empl->id}}/edit"  class="bi bi-folder-plus"></a> |
                                             {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                             <a href="/employees/{{$empl->id}}" class=""><i class="bi bi-text-paragraph"></i></a>
                                        </form>
                                        
                                   </td>
                              </tr>
                         @endforeach

                    </table>
               </div>

               <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Tasks</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <form action="/employees" method="post" class="">
                                        @csrf
                                   <div class="row">
                                        <!-- h -->
                                        <div class="">
                                             <label for="" class="form-label">First Name</label>
                                             <input type="text" name="fname" class="form-control flex-col" id="fname" required placeholder="First name...">
                                             
                                        </div>
                                        <div class="mt-2">
                                             <label for="" class="form-label">Last Name</label>
                                             <input type="text" name="lname" class="form-control flex-col" id="lname" required placeholder="Last name...">
                                             
                                        </div>
                                        <div class="mt-2">
                                             <label for="" class="form-label">Email</label>
                                             <input type="email" name="email" class="form-control flex-col" id="email" required placeholder="Email...">
                                             
                                        </div>
                                        <div class="mt-2">
                                             <label for="" class="form-label">Phone</label>
                                             <input type="text" name="phone" class="form-control flex-col" id="phone" required placeholder="Phone...">
                                             
                                        </div>
                                        <div class="mt-2">
                                             <label for="depId" class="form-label">Department</label>
                                             <select name="depId" id="" class="form-control">
                                                  <option value="" style="display: none;">Choose Department</option>
                                                  @foreach($deps as $dep)
                                                       <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                  @endforeach
               
                                             </select>
                                        
                                        </div>
                                   </div>
                                        <button type="submit" style="float: right" class="btn btn-info mt-3 form-control">Add New</button>
                                        
                                   </form>
                              </div>
                         </div>
                    </div>
               
                    
               </div>
               <br>
               <a href="/" class="btn btn-info">Back</a>
          </div>

     
@endsection