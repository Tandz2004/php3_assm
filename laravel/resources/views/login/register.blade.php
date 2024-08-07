
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
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
                @error('name')

                <span class="text-danger"> {{ $message }}
                </span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control">
                @error('username')

                <span class="text-danger">
                    {{ $message }}
                </span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
                @error('email')

                <span class="alert alert-danger">
                    {{ $message }}
                </span>
                    
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Image</label>
                <input class="form-control" type="file" name="avatar" id="fileImage" >
                <br>
                <img id="img" src="{{ asset('/storage/') }}" width="60" alt="">

                @error('avatar')

                <span class="text-danger">{{ $message }}</span>

                @enderror
              </div>


            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
                @error('password')

                <span class="alert alert-danger">
                    {{ $message }}
                </span>
                    
                @enderror
            </div>

            <div class="d-flex gap-1">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="mb-3">
                    <a class="btn btn-danger" href="{{ route('login') }}">Login</a>
                </div>
            </div>
            
        </form>
    </div>

    <script>
        var fileImage = document.querySelector('#fileImage');
        var img = document.querySelector('#img');
  
        fileImage.addEventListener('change', function(e){
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        } )
  
    </script>
</body>
</html>
