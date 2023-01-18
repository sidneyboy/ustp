<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">


    <title>USTPTrack</title>
    <style>
        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background:#EEF0FC">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-primary"
                        style="background:#14144A;border-radius: 30px;width:150px;color:#FBB313" href="#"
                        role="button" data-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" style="width:200px;padding:10px;">
                        <form method="POST" action="{{ route('ustp_login') }}" class="user">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" style="border-color:#14144A">
                                        <span class="input-group-text" id="basic-addon1"
                                            style="background:transparent"><i class="bi bi-envelope"></i></span>
                                    </div>
                                    <input type="email" style="border-color:#14144A" class="form-control"
                                        placeholder="Username" name="username" required aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3" style="border-color:#14144A">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background:transparent"
                                            id="basic-addon1"><i class="bi bi-lock"></i></span>
                                    </div>
                                    <input type="password" required style="border-color:#14144A" class="form-control"
                                        placeholder="Password" name="password" aria-label="Password"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <button class="btn btn-sm btn-block"
                                style="background:#14144A;border-radius:30px;color:white">Sign In</button>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled"></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <center>

            <br />
            <img src="{{ asset('/img/ustp_front.png') }}" style="border:0px;" class="img img-thumbnail" alt="">

            @if (session('error'))
                <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('student_data_code') }}" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" name="code" class="form-control"
                        style="border-top-left-radius: 30px;border-bottom-left-radius: 30px;border:2px solid;border-color: #FBB313">
                    <div class="input-group-append">
                        <button type="submit" class="btn"
                            style="border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-color:#FBB313"
                            type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <p style="color:#14144A;font-weight:bold;">Can't find? Please contact helpdesk</p>

            <!-- Another variation with a button -->


        </center>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
