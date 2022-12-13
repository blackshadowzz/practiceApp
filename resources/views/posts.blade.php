@extends('layouts.master')
@section('title', 'Post')
@section('content')

<div class="container">
     <div>
          <h4>Post List</h4>
     </div>
     <table class="table">
          <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Description</th>
               
          </tr>

          @foreach ($post as $p)
               <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->Description }}</td>
               </tr>
          @endforeach
     </table>
</div>

@endsection