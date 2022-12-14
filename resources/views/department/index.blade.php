@extends('layouts.master')
@section('title', 'Department')
@section('content')
     <div class="container-fluid">
          <div style="" class="mt-3">
               <div>
                    <button type="button" style="float: left;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>
               </div>
               <div style="text-align:center;" >
                    <h2 style="text-transform: uppercase;font-size:25px">Department</h2>
               </div>

          </div>
     
          @if(Session::has('message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
               {{Session::get('message')}}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div>
               <table class="table table-striped table-bordered table-hover shadow mt-3">
                    <thead class="table-dark">
                         <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Actions</th>
                         </tr>
                    </thead>
                    @foreach($dep as $dept)

                         <tr>
                              <td>{{$dept->id}}</td>
                              <td>{{$dept->name}}</td>
                              <td>{{$dept->description}}</td>
                           
                              <td>
                                   <form action="/departments/{{$dept->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/departments/{{$dept->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/department/{{$dept->id}}" class="bi bi-text-paragraph"></a>
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
                         <h5 class="modal-title" id="exampleModalLabel">Create Department</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <form action="/departments" method="post" class="">
                                   @csrf
                              <div class="row">
                                   <!-- h -->
                                   <div class="">
                                        <label for="name" class="form-label">Department's Name</label>
                                        <input type="text" name="name" class="form-control flex-col" id="name" required placeholder="Department...">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                             
                                        @enderror
                                        
                                   </div>
                                   <div class="mt-2">
                                        <label for="description" class="form-label">Desciption</label>
                                        <input type="text" name="description" class="form-control flex-col" id="description" required placeholder="Description...">
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                             
                                        @enderror
                                        
                                   </div>
                             
                              </div>
                                   <button type="submit" style="float: right" class="btn btn-info mt-3 form-control">Add New</button>
                                   
                              </form>
                         </div>
                    </div>
               </div>
          
               
          </div>

     </div>
@endsection