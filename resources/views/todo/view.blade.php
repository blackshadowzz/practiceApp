@extends('layouts.master')
@section('title', 'View Todo')
@section('content')
          <div>
               <h3 style="color: white;background:black;padding: 10px 0px 10px 10px;margin-top:10px;">View Detail Of Record</h3>
          </div>
        <hr class="bg-dark ">
        <table class="table table-bordered table-hover">
          <tr>
            <dl class="row">
               
                <dt class="col-sm-2">
                      ID
                </dt>
                <dd class="col-sm-10">
                    {{ $task->id }}
                </dd>
               
                <dt class="col-sm-2">
                      {{ __('Detail') }}
                </dt>
                <dd class="col-sm-10">
                    {{ $task->detail }}
                </dd>
                <dt class="col-sm-2">
                       Status
                </dt>
                <dd class="col-sm-10">
                    {{ $task->status }}
                </dd>
                <dt class="col-sm-2">
                       Create Date
                </dt>
                <dd class="col-sm-10">
                    {{ $task->created_at }}
                </dd>
                <dt class="col-sm-2">
                       Update Date
                </dt>
                <dd class="col-sm-10">
                    {{ $task->updated_at }}
                </dd>
               
            </dl>
          </tr>
          </table>
          <hr class="bg-dark ">
            <div class="col-sm-12">
                <a href="/home/todo/edit/{{$task->id}}" class="btn btn-md btn-primary">Change</a>
                <a href="/home/todo" class="btn btn-secondary ">Todo</a>
            </div>
@endsection