@extends('Layouts.master')
@section('title','Permission')
@section('content')
     <div class="container">
          <form action="{{ route('store_permission') }}" method="post">
               @csrf
               <div class="form-group">
                <label for="name">Permission Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    required id="name" placeholder="Permission Name">
               </div>
               <div class="form-group">
                <label for="slug">Permission Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}"
                    required id="slug" placeholder="Permission slug">
               </div>
               <div class="d-flex justify-content-end mt-2">
                    <a href="/users/permissions/index" class="btn btn-info mr-3">Back</a>
                    <button class="btn btn-primary" type="submit">Create Permission</button>

               </div>
          </form>
     </div>
@endsection