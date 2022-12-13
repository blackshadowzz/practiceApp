@extends('Layouts.master')
@section('title','Permission')
@section('content')
     <div class="container-fluid">
          <div class="d-flex justify-content-between">
               <a href="/users/permission/create" class="btn btn-primary">Create Permission</a>
          </div>
          <div>
               <table class="table table-hover shadow mt-3">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Permission</th>
                              <th>Slug</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    @forelse ($per as $p)
                         <tr>
                              <td>{{ $p->id }}</td>
                              <td>{{ $p->name }}</td>
                              <td>{{ $p->slug }}</td>
                              <td class="d-flex justify-content-between">
                                   <form action="/users/permissions/{{ $p->id }}/delete"  method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" type="submit" class="bi bi-trash"></a>
                                   </form>
                              </td>
                         </tr>
                         @empty
                         <h5>No Data</h5>
                    @endforelse
                         
               </table>
          </div>
     </div>
@endsection