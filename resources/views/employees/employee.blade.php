@extends('layouts.master')
@section('title', 'Employee')
@section('content')
          <div class="container-fluid">
               <div class="title-bar">
                    <h2 class="title-emp">Employee</h2>
               </div>
               
               
               @if(Session::has('message'))
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif
               <div class="mb-1 mt-3">
                    <div class="row">
                         <div class="col-1">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>
                         </div>
                      <div class="col-8">
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
                      <div class="col-2 d-flex justify-content-end">
                         <a href="{{ route('createpdf') }}" class="btn btn-info">Print PDF</a>
                      </div>
                      <div class="col-1">
                         <div class="d-flex justify-content-end">
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
                                   <th>Fullname</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>DepID</th>
                                   <th>Photo</th>
                                   <th>Create At</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         @foreach($emp as $empl)

                              <tr>
                                   <td>{{$empl->id}}</td>
                                   <td>{{$empl->fname}}</td>
                                   <td>{{$empl->lname}}</td>
                                   <td>{{$empl->fname}} {{ $empl->lname }}</td>
                                   <td>{{$empl->email}}</td>
                                   <td>{{$empl->phone}}</td>
                                   <td>{{$empl->department->name}}</td>
                                   <td style="width: 50px">
                                        <img src="/storage/employees/profile/{{ $empl->image_path }}" width="85px" height="80px" alt="Image" >
                                   </td>
                                   <td>{{$empl->created_at}}</td>
                                   <td style="width: 10%">
                                        <form action="/employees/{{$empl->id}}" method="post" class="d-flex justify-content-around">
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
               <div class="d-flex justify-content-center">
                    {!! $emp->onEachSide(2)->links('pagination::bootstrap-4') !!}
               </div>
               <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog modal-xl" style="width: 70%">
                         <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <form action="/employees" method="post" class="" enctype="multipart/form-data">
                                        @csrf
                                   <div class="row">
                                        <div class="col-7">
                                             <!-- h -->
                                             <div class="">
                                                  <label for="" class="form-label">First Name</label>
                                                  <input type="text" name="fname" class="form-control flex-col" id="fname" required placeholder="First name...">
                                                  @error('fname')
                                                  <span class="text-danger">{{ $message }}</span>
                                                       
                                                  @enderror
                                                  
                                             </div>
                                             <div class="mt-2">
                                                  <label for="" class="form-label">Last Name</label>
                                                  <input type="text" name="lname" class="form-control flex-col" id="lname" required placeholder="Last name...">
                                                  @error('lname')
                                                  <span class="text-danger">{{ $message }}</span>
                                                       
                                                  @enderror
                                                  
                                             </div>
                                        
                                             <div class="mt-2">
                                                  <label for="" class="form-label">Phone</label>
                                                  <input type="text" name="phone" class="form-control flex-col" id="phone" required placeholder="Phone...">
                                                  
                                             </div>
                                        
                                             <div class="mt-2">
                                                  <label for="" class="form-label">Email</label>
                                                  <input type="email" name="email" class="form-control flex-col" id="email" required placeholder="Email...">
                                                  
                                             </div>
                                        
                                            
                                             <div class="mt-2">
                                                  <label for="depId" class="form-label">Department</label>
                                                  <select name="depId" id="" class="form-control">
                                                       <option value="" style="display: none;">Choose Department</option>
                                                       @foreach($deps as $dep)
                                                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                       @endforeach
                                                       @error('depId')
                                                       <span class="text-danger">{{ $message }}</span>
                                                            
                                                       @enderror
                    
                                                  </select>
                                             
                                             
                                             </div>
                                        </div>
                                        <div class="col-5">
                                             <div class="row">
                                                  <div class="col-12">
                                                       <img src="" alt="profile" id="profile">
                                                  </div>
                                                  <input type="file" name="photo" accept="image/*" class="mt-2 form-control">
                                             </div>
                                        </div>     
                                   </div>
                                   <div class="modal-footer mt-2">
                                        <button type="submit" style="float: right" class="btn btn-info ">Add New</button>
                                   </div>
                                        
                                        
                                   </form>
                              </div>
                         </div>
                    </div>
               
                    
               </div>
          </div>
          <script>
               let profile= document.querySelector('input[type=file]');
               profile.addEventListener("change",function(e){
                    var img = document.querySelector('#profile');
                    img.setAttribute("src",window.URL.createObjectURL(e.target.files[0]));
                    img.setAttribute("style", "display.block;width:100%;height:330px;object-fit:fill;");
                    output.onload = function(){
                         URL.revokeObjectURL(output.src)
                    }

               });
          </script>
     
@endsection