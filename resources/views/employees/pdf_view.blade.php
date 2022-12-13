<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Print Report</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <style>
          .report-title{
               display: flex;
               justify-content: space-between;
               background-color: rgb(7, 95, 122);
               color: white;
              
               padding:10px 0px;
          }
          .col-4{
               display: inline-flex;
               font-size:20px;
               font-weight: 500;
               font-family: Arial, Helvetica, sans-serif;
          }
          .table{
               font-size: 12px;
          }

     </style>
</head>
<body>

     <div class="">
          <div class="report-title">
               <div class="row">
                    <div class="col">
                      Employee
                    </div>
                    <div class="col">
                         Date: {{  now()->toDateTimeString() }}
                    </div>
                  </div>
          </div>
          {{-- <div class="row">
               <div class="col-md-6">
                    <h4 class="">Employee Report</h4>
               </div>
               <div class="col-md-6">
                    <p>Date:{{  now()->toDateTimeString() }}</p>
               </div>

          </div> --}}
          <table class="table table-striped table-bordered shadow">
               <thead class="table-dark">
                    <tr>
                         <th>ID</th>
                         <th>Fullname</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>DepID</th>
                         <th>Create At</th>
                    </tr>
               </thead>
               @foreach ($data as $d)
               <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->fname }} {{ $d->lname }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->phone }}</td>
                    <td>{{ $d->department->name}}</td>
                    {{-- <td style="width: 50px">
                         <img src="/storage/employees/profile/{{ $d->image_path }}" width="85px" height="80px" alt="Image" >
                    </td> --}}
                    <td>{{ $d->created_at->format('d/m/Y') }}</td>
               </tr>
                    
               @endforeach
               
     
          </table>
         
     </div>

</body>
</html>



{{-- @endsection --}}