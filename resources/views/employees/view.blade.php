@extends('layouts.master')
@section('title', 'View Todo')
@section('content')
     <div class="">
          <div>
               <h3 style="color: white;background:black;padding: 10px 0px 10px 10px;margin-top:10px;">View Detail Of Record</h3>
          </div>
        <hr class="bg-dark ">
        <div class="container d-flex">
            <div class="flex-shrink-0">
              <img style="width: 100%;height:300px;" src="/storage/employees/profile/{{ $emp->image_path }}" alt="Photo">
            </div>
            <div class="flex-grow-1 ms-3">
                <ul class="list-group">

                    <li class="list-content list-group-item">ID: <strong>{{ $emp->id }}</strong></li>
                    <li class="list-content list-group-item">First Name: <strong>{{ $emp->fname }}</strong></li>
                    <li class="list-content list-group-item">Last Name: <strong>{{ $emp->lname }}</strong></li>
                    <li class="list-content list-group-item">Email: <strong>{{ $emp->email }}</strong></li>
                    <li class="list-content list-group-item">Phone: <strong>{{ $emp->phone }}</strong></li>
                    <li class="list-content list-group-item">Department: <strong>{{ $emp->department->name }}</strong></li>

                  </ul>
            </div>
            <br>
            <div class="card" style="width:400px">
                <img class="card-img-top" src="/storage/employees/profile/{{ $emp->image_path }}" alt="Card image" style=";height:300px">
                <div class="card-body">
                  <h4 class="card-title">{{ $emp->fname }} {{ $emp->lname }}</h4>
                  <p style="card-text">ID : {{ $emp->id }}</p>
                  <p class="card-text">{{ $emp->email }}</p>
                  <a href="#" class="btn btn-primary">See Profile</a>
                </div>
              </div>
        </div>
          <hr class="bg-dark ">
            <div class="col-sm-12">
                <a href="/employees/{{$emp->id}}/edit" class="btn btn-md btn-primary">Change</a>
                <a href="/employees" class="btn btn-secondary ">Back</a>
            </div>
          </div>
@endsection