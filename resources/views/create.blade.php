<!DOCTYPE html>
<html lang="en" >
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Practice 02</title>
      <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body style="background-color: white;">
     <div style="margin-top:2em;">
          <div class="row mt-4">
               <div class="col-md-3"></div>
               <div class="col-md-6 well">
                    <div style="text-align: center;">
                         <h2 class="text-primary">To Do List</h2>
                    </div>
                    <hr style="border-top: 2px solid black;"/>
                    <div class="col-md-12 ">
                         <!-- <center> -->
                              <form action="/home/todo/update" method="post" class="form-inline">
                                   @csrf
                                   @method("PUT")
                                   <label for="" class="form-label">Task</label>
                                   <input type="text" name="task_detail" class="form-control flex-col" id="" required placeholder="Enter task here">
                                   <br>
                                   <label for="status" class="form-label">Status</label>
                                   <select name="status" id="" class="form-control">
                                        <option value="" style="display: none;">Choose status</option>
                                        <option value="done">Done</option>
                                        <option value="pedding">Pedding</option>

                                   </select>
                                   <br>
                                   <button type="submit" class="btn btn-info form-control">Add Task</button>
                              </form>
                         <!-- </center> -->
                    </div>
               </div>
          </div>
     </div>
     <div>
          <a href="/" class="btn btn-info">Back</a>
     </div>
</body>
</html>