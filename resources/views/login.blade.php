<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mt-5">To Do List Application</h1>
    <h2 class="text-center text-primary">Plan your day!</h2>

    <div class="container">
    <div class="col-4 ">
      <form action="/login" method="post">
        @csrf
        <div class="form-group ">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Login</button>
        <div>
          <small id="emailHelp" class="form-text text-muted">Tidak punya akun? <a href="/register-view">Daftar</a></small>
        </div>
      </form>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>