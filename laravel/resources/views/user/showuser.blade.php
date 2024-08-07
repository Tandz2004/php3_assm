
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
        <h1>Edit Profile</h1>
        <form action="{{ route('user.updateuser', Auth::user()->id) }}" method="post" enctype="multipart/form-data"> 
             @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ Auth::user()->name }}">
                @error('name')

                <span class="text-danger"> {{ $message }}
                </span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" id="" class="form-control" value="{{ Auth::user()->username }}">
                @error('username')

                <span class="text-danger">
                    {{ $message }}
                </span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{ Auth::user()->email }}">
                @error('email')

                <span class="alert alert-danger">
                    {{ $message }}
                </span>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label"> Avatar </label>
                <input class="form-control" type="file" name="avatar" id="fileImage" >
                <br>
                <img id="img" src="{{ asset('/storage/') }}" width="60" alt="">

            </div>
            

            <div class="d-flex gap-1">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Thay đổi </button>
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
