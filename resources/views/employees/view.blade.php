@extends('layouts.master')
@section('title', 'View Todo')
@section('content')
     <div class="mt-5">
          <div>
               <h3 style="color: white;background:black;padding: 10px 0px 10px 10px;margin-top:10px;">View Detail Of Record</h3>
          </div>
        <hr class="bg-dark ">
        <table class="table table-bordered table-hover" style="padding-left: 20px;">
          <tr>
            <dl class="row">
               
                <dt class="col-sm-2">
                      ID
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->id }}
                </dd>
               
                <dt class="col-sm-2">
                      {{ __('First Name') }}
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->fname }}
                </dd>
                <dt class="col-sm-2">
                       Last Name
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->lname }}
                </dd>
                <dt class="col-sm-2">
                       Email
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->email }}
                </dd>
                <dt class="col-sm-2">
                       Phone
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->phone }}
                </dd>
                <dt class="col-sm-2">
                       Department
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->depId }}
                </dd>
                <dt class="col-sm-2">
                       Created At
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->created_at }}
                </dd>
                <dt class="col-sm-2">
                       Updated At
                </dt>
                <dd class="col-sm-10">
                    {{ $emp->updated_at }}
                </dd>
               
               
            </dl>
          </tr>
          </table>
          <hr class="bg-dark ">
            <div class="col-sm-12">
                <a href="/employees/{{$emp->id}}/edit" class="btn btn-md btn-primary">Change</a>
                <a href="/employees" class="btn btn-secondary ">Back</a>
            </div>
          </div>
@endsection