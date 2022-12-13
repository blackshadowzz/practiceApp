@extends('Layouts.master')
@section('title','Product')
@section('content')

<div class="container-fluid">
     <div class="d-flex justify-content-start">
          <h4>Product List</h4>
          <a href="/products/create" class="btn btn-outline-primary ml-3">Create New</a>
     </div>
     <hr class="border border-danger border-2 opacity-50"/>
     <div class="row">
          <div class="col-md-12 table-responsive">
               <div>
                    <h5>All Rows and Column</h5>
               </div>
               <table class="table table-sm table-bordered">
                    <tr>
                         <th>ID</th>
                         <th>Title</th>
                         <th>Cost</th>
                         <th>Asset</th>
                         <th>Description</th>
                         <th>Actions</th>
                       
                    </tr>
                    @foreach ($pro as $p)
                         <tr>
                              <td>{{ $p->product_id }}</td>
                              <td>{{ $p->title }}</td>
                              <td>$ {{ $p->cost }}</td>
                              <td>$ {{ $p->asset }}</td>
                              <td>{{ $p->description }}</td>
                              <td>
                                   <form action="/products/{{ $p->product_id }}" method="post" class="d-flex justify-content-start">
                                        @csrf
                                             @method('DELETE')
                                             <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger mr-4"></a> 
                                             <a href="/products/{{ $p->product_id }}/edit"  class="bi bi-folder-plus"></a>
                                            
                                   </form>
                              </td>
                             
                         </tr>
                    @endforeach
               </table>
          </div>
          <div class="col-md-6 table-responsive">
               <div>
                    <h5>All Rows and Some Column</h5>
               </div>
               <table class="table table-sm table-bordered">
                    <tr>
                   
                         <th>Title</th>
                         <th>Cost</th>
                        
                    
                    </tr>
                    @foreach ($pro2 as $p)
                         <tr>
                             
                              <td>{{ $p->title }}</td>
                              <td>$ {{ $p->cost }}</td>
                             
                            
                         </tr>
                    @endforeach
               </table>
          </div>
          <div class="col-md-6 table-responsive">
               <div>
                    <h5>Specify record</h5>
               </div>
               <table class="table table-sm table-bordered">
                    <tr>
                         <th>ID</th>
                         <th>Title</th>
                         <th>Cost</th>
                         <th>Asset</th>
                         <th>Description</th>
                        
                    </tr>
                    <tr>
                         <td>{{ $pro3->product_id }}</td>
                         <td>{{ $pro3->title }}</td>
                         <td>$ {{ $pro3->cost }}</td>
                         <td>$ {{ $pro3->asset }}</td>
                         <td>{{ $pro3->description }}</td>
                         
                    </tr>
               </table>
          </div>
     </div>
</div>
@endsection