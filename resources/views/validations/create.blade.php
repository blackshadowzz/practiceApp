<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Validation</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
     <div class="container">
          <div class="card mt-4">
               <div class="card-header">
                    <div class="card-title">
                         <h4>Validate Form</h4>
                    </div>
                    <div class="card-body">
                         <form action="/validations/store" method="post">
                              @csrf
                              <div class="row">
                                   <div class="col-6">
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                        class="form-control" placeholder="name">
                                        @error('name')
                                             <span class="text-danger">{{ $message }}</span>                                        
                                        @enderror
                                   </div>
                                   
                                   <div class="col-6">
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                                        @error('email')
                                             <span class="text-danger">{{ $message }}</span>                                        
                                        @enderror
                                   </div>
                              </div>
                              <div class="row mt-3">
                                   <div class="col-6 ">
                                        <input type="password" name="password" id="password" value="" class="form-control
                                        @error('password') is-invalid @enderror" 
                                        placeholder="password" autocomplete="current-password">
                                        @error('password')
                                             <span class="text-danger">{{ $message }}</span>                                        
                                        @enderror
                                   </div>
                                   <div class="col-6">
                                        <input type="password"
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password_confirmation" autocomplete="current-password" placeholder="Repeat password">
                                   </div>
                              </div>
                              

                              <div>
                                   <button type="submit" class="btn btn-info mt-3">Submit</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <div>
              <table class="table table-hover mt-3">
                    <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Password</th>
                    </tr>
                    @foreach ($data as $d)
                         <tr>
                              <td>{{ $d->id }}</td>
                              <td>{{ $d->name }}</td>
                              <td>{{ $d->email }}</td>
                              <td>{{ $d->password }}</td>
                         </tr>
                    @endforeach
              </table>
          </div>
     </div>
</body>
</html>