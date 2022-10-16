@extends('layouts.master')
@section('title', 'Homework01')
@section('content')
<div class="" style="width: 40%;margin:auto;">
     <div class="mt-5">
          <h4>Homework 01</h4>
     </div>
     <form action="/homeworks" method="POST">
          @csrf
          <div class="mt-2">
               <label for="salutation" class="form-label">Salutation</label>
               <select name="salutation" class="form-select" id="salutation">
                    <option value="" style="display: none">None</option>
                    <option value="ms">Ms.</option>
                    <option value="mr">Mr.</option>
               </select>
          </div>
          <div class="mt-2">
               <div class="row">
                    <div class="col-6">
                         <label for="fname" class="form-label">First Name</label>
                         <input type="text" class="form-control" name="fname" placeholder="First name...">
                    </div>
                    <div class="col-6">
                         <label for="lname" class="form-label">Last Name</label>
                         <input type="text" class="form-control" name="lname" placeholder="Last name...">
                    </div>
               </div>
          </div>
          <div class="mt-2">
               <label for="gender" style="padding-right: 20px" class="form-label">Gender</label>
               <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
          </div>
          <div class="mt-2">
               <label for="email" class="form-label">Email</label>
               <input type="email" name="email" id="email" class="form-control" value="" placeholder="Email..." >
          </div>
          <div class="mt-2">
               <label for="dob" class="form-label">Date of Birth</label>
               <input type="date" name="dob" id="dob" class="form-control">
          </div>
          <div class="mt-2">
               <label for="address" class="form-label">Address</label>
               <textarea name="address" id="" cols="30" rows="4" class="form-control"></textarea>
          </div>

          <div class="mt-3">
              <button type="submit" class="btn btn-primary">Add New</button> 
          </div>
     </form>
</div>


@endsection