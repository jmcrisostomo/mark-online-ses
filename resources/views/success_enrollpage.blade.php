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
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <x-navbar />

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="container-fluid">
                <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 50vh">
                    <img src="{{ asset('/assets/img/check-icon.png') }}" class="w-25 mb-3" alt="">
                    <h1>Thank you for filling out the Enrollment Form</h1>
                    <h4>For your User Account, please check your email.</h4>

                    <a href="{{ url('/') }}">Click here to return to main page</a>
                </div>
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
