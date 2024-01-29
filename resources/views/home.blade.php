<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8">
      <div class="d-flex justify-content-end">
        <a href="/logout" class="btn btn-danger mt-5">Logout</a>
      </div>
      
      <h2 class="text-center mb-5">Hello, {{ $name }}. Lets plan your day!</h2>
      

          <div class="col-4">
            <form action="/storeTodo" method="post">
              @csrf
              <div class="input-group mb-3">
                <input type="hidden" name="userId" value={{ $userId }}>
                <input type="text" class="form-control" placeholder="Todo" id="todo" name="todo">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
            
      <div class="d-flex justify-content-center">
        <div class="col-12">
          <table class="table table-success table-striped table-hover border-success text-center">
            <thead>
              <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">ToDo</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @php
                  $nomor=1;
              @endphp
              @foreach ($todolists as $tdl)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $tdl->todo }}</td>
                <td>
                  <a href="/removeTodo/{{ $tdl->id }}" class="btn btn-success">Selesai</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    
    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>