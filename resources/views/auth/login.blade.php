<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Royal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: #403daa;">
    <div class="container-fluid">
        <div class="row justify-content-center d-flex align-items-center mt-5">
            <div class="col-sm-4">
                @include("components.errors")
                <div class="card" >
                    <div class="card-header">
                        Please enter your credentials
                    </div>
                    <div class="card-body">
                        <form action="{{route("login-post")}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="form-floating mb-3 col-sm-12">
                                <input type="email" class="form-control" name="email" id="floatingInput" value="{{old("email")}}" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                              </div>
                              <div class="form-floating col-sm-12 mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                              </div>   
                              <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-outline-success"> Login</button>
                              </div>
                        </form>
                    </div>     
                </div>
              
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>