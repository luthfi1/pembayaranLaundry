<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="https://padangpariamankab.go.id/wp-content/uploads/2016/11/cropped-favicon-2.png" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- fonts google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">


    <title>Laundry APP</title>

    <style>
        body{
            font-family: "Nunito Sans";
            padding: 0;
            margin: 0;
            height: 100vh;
        }
        .first{
            background: #343a40;
        }
        .form-label{
            font-weight: bold;
        }
        .form-control{
            line-height: 2;
        }
        .btn-login{
            width: 100%;
            color: #fff;
        }
        .btn-register{
            width: 100%;
        }

        @media(max-width: 932px){
            .display-none{
                display: none !important;
            }
        }

    </style>

</head>

<body>
    
    <div class="row m-0 h-100">
        <div class="first col p-0 d-flex justify-content-center align-items-center display-none">
            <img src="template/dist/img/logo.svg" class="w-75 h-75">
        </div>

        <div class="col p-0 d-flex justify-content-center align-items-center flex-column w-100">
            <form method="post" action="{{route('login')}}" class="w-75">
                @csrf
                <h2>HI,</h2>
                <p style="margin-top: -10px;">Silakan Login dibawah ini</p>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username anda">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-secondary btn-login"><i class="fa fa-sign-in"></i> Submit</button>
              </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>