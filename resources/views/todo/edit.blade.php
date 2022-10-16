<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

     <title>Update</title>
</head>
<body>
     <div class="container">
          <div>
               <h3>Update Task</h3>
          </div>
          <form action="{{ url('home/todo/edit',$task->id) }}" method="post">
               @csrf
               @method('put')
               <div class="mb-3">
                    <label for="detail" class="form-label">Detail</label>
                    <input type="text" name="detail" value="{{$task->detail}}" class="form-control">
               </div>
               <div class="mb-3">
                    <label for="status" class="col-form-label" >Status</label>
                    <select name="status" id="" class="form-control">
                         <option value="" style="display: none;">Choose status</option>
                         <option value="done" {{ $task->status=='done'?'selected':'' }}>Done</option>
                         <option value="pending" {{ $task->status=='pending'?'selected':'' }}>Pending</option>
                    </select>
               </div>
               <div class="mb-3">
                    <button type="submit" class="btn btn-success ">Update Now</button>
                    <a href="/home/todo" class="btn btn-info">Cancel</a>
               </div>
          </form>
     </div>
</body>
</html>