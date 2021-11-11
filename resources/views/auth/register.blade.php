<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-12">
      <h4>User Register</h4>
      <form action="{{route('auth.create')}}" method="post">
        @csrf
        <div class="result">
          @if (Session::get('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
          
          @endif

          @if (Session::get('fail'))
          <div class="alert alert-danger">
            {{Session::get('fail')}}
          </div>
          
          @endif
        </div>
        <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name')}}">
        <span class="text-danger">@error ('name'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Enter email">
        <span class="text-danger">@error ('email'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <label for="">password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password">
        <span class="text-danger">@error ('password'){{$message}} @enderror</span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">register</button>
      </div>
      <br>
      <a href="login">I already have  eccount</a>
      </form>
    

    </div>
  </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>