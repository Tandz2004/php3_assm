
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="<KEY>" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="<KEY>" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container w-50">
        <h1>Login</h1>
        @if (session('message'))
        <div class="alert alert-success">
        {{ session('message') }}
         </div> 
        @endif

        @if (session('errorLogin'))
        <div class="alert alert-danger">
        {{ session('errorLogin') }}
         </div> 
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
           <div class="d-flex gap-1">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="mb-3">
                <a class="btn btn-danger" href="{{ route('register') }}">Register</a>
            </div>
           </div>
        </form>
    </div>
</body>
</html>