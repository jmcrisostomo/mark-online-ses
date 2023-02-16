<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Online SES - Electron College of Technical Education</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
        .login-bg {
            background-image: url(http://127.0.0.1:8000/assets/img/login-bg.png);
            background-position: 60% top;
            clip-path: polygon(0 0%, 100% 0, 70% 100%, 0 100%);
            height: 80vh;
            background-color: gray;
            background-blend-mode: multiply;
            box-shadow: 5px 5px 10px rgb(0 0 0 / 50%);
            /* width: 100vw; */
        }
    </style>
</head>

<body>

    <x-navbar />




    <div class="row bg-light">
        <div class="login-bg col-lg-8 d-lg-block d-none"></div>

        <div class="col-lg-4">

            <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
                <form method="POST" action="{{ route('login-user') }}" class="form w-100 me-lg-5 me-0">
                    @csrf

                    <legend class="mb-3 h1 text-center">Login</legend>

                    {{-- Username Input --}}
                    <div class="mb-3">
                        <div class="form-outline input-control">
                            <input id="username" type="text" name="username" class="input-field"
                                placeholder="Username" value="{{ isset($username) ? $username : '' }}">
                            <label for="username" class="input-label">Username</label>
                        </div>
                    </div>

                    {{-- Password Input --}}

                    <div class="mb-3">
                        <div class="form-outline input-control">
                            <input id="password" type="password" name="password" class="input-field"
                                placeholder="Password">
                            <label for="password" class="input-label">Password</label>
                        </div>
                    </div>

                    @isset($alert)
                        @if ($alert == 'EMPTY_FIELD')
                            <div class="alert alert-warning" role="alert">
                                Username and Password cannot be empty!
                            </div>
                        @endif
                        @if ($alert == 'EMPTY_PASS')
                            <div class="alert alert-warning" role="alert">
                                Password cannot be empty!
                            </div>
                        @endif
                        @if ($alert == 'INCORRECT')
                            <div class="alert alert-danger" role="alert">
                                Password or Username not valid!
                            </div>
                        @endif
                    @endisset

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('not_logged_in'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('not_logged_in') }}
                        </div>
                    @endif

                    @if (session('already_verified'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('already_verified') }}
                        </div>
                    @endif

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        {{-- <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                    checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div> --}}

                        {{-- <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div> --}}
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4 btn-lg w-100">Log in</button>
                    <a href="{{ url('/registration') }}" class="btn btn-primary btn-block mb-4 btn-lg w-100">Register</a>

                    <!-- Register buttons -->
                    {{-- <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row centered">
            {{-- <div class="col-lg-6 col-lg-offset-3">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter your email address">
                </div>
                <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
            </form>
        </div> --}}
            {{-- <div class="col-lg-3"></div> --}}
        </div><!-- /row -->
        <hr>
        <p class="centered">Built with ♥ - 2022</p>
    </div><!-- /container -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
