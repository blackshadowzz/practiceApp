<x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Todo List') }}
         </h2>
 
     </x-slot>

     <div style="">
          @if(Session::has('message'))
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
          @endif
          <div class="mt-4">
               <div class="col-md-3"></div>
               <div class="">
                    <div class="d-flex mb-3">
                         <div class="div">
                              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Create Task</button>
                         </div>
                         
                         <div>
                              <div class="dropdown">
                                   <button class="btn btn-md btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                           <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                                       </svg>
                                       Task Filter
                                   </button>
                                   <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/home/todo">All</a></li>
                                        <li><a class="dropdown-item" href="/home/todo/done">Done</a></li>
                                        <li><a class="dropdown-item" href="/home/todo/pending">Pending</a></li>
                                   </ul>
                               </div>
                         </div>
                    </div>
                    </div>
               </div>
               <hr style="border-top: 2px solid black;"/>
               <div>
                    <br>
                    <table class="table table-bordered table-striped table-hover shadow ">
                         
                         <tr class="tr">
                              <th >ID</th>
                              <th>Task</th>
                              <th>Status</th>
                              <th>Create Date</th>
                              <th style="width: 10%;">Action</th>
                         </tr>
                         @foreach($tasks as $task)
                              <tr>
                                   <td>{{$task->id}}</td>
                                   <td>{{$task->detail}}</td>
                                   <td>{{$task->status}}</td>
                                   <td>{{$task->created_at}}</td>
                                   <td style="">
                                        <form action="/home/todo/delete/{{$task->id}}" method="post">
                                             @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                             <a href="/home/todo/edit/{{$task->id}}"  class="bi bi-folder-plus"></a> | 
                                             {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                             <a href="/home/todo/view/{{$task->id}}" class="bi bi-text-paragraph"></a>
                                        </form>
                                   </td>
                              </tr>
                         @endforeach
                        
                    </table>
               </div>
          </div>

          {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button> --}}

          <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Create Tasks</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/todo/create" method="POST" class="">
                         @csrf
                         @method('POST')
                    <div class="row">
                         <!-- h -->
                         <div class="">
                              <label for="" class="form-label">Task</label>
                              <input type="text" name="detail" class="form-control flex-col" id="" required placeholder="Enter task here">
                              
                         </div>
                         <div class="">
                              <label for="status" class="form-label">Status</label>
                              <select name="status" id="" class="form-control">
                                   <option value="" style="display: none;">Choose status</option>
                                   <option value="done">Done</option>
                                   <option value="pending">Pending</option>

                              </select>
                         
                         </div>
                    </div>
                         <button type="submit" class="btn btn-info mt-3">Add Task</button>
                         
                    </form>
               </div>
          </div>
          </div>
     
          
     </div>
</x-app-layout>