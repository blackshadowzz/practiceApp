<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Create Photos</title>
</head>
<body>
     <form action="/photos" method="post">
          @csrf
          <label for="">name</label>
          <input type="text" name="name">
          <label for="">Email</label>
          <input type="text" name="email">
          <button>Click</button>
     </form>
</body>
</html>