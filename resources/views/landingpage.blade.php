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
</head>

<body>

    <x-navbar/>

    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Enrollment has never been easier.</h1>
                    <a href="{{ url('/registration') }}" class="btn btn-warning btn-lg">Enroll Now!</a>
                </div><!-- /col-lg-6 -->
                <div class="col-lg-6">
                    <div class="text-center">
                        <img class="img-responsive" src="assets/img/ipad-hand.png" alt="">
                    </div>
                </div><!-- /col-lg-6 -->

            </div><!-- /row -->
        </div><!-- /container -->
    </div><!-- /headerwrap -->


    <div class="container d-none">
        <div class="row mt centered">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>Your Landing Page<br />Looks Wonderful Now.</h1>
                <h3>It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout.</h3>
            </div>
        </div><!-- /row -->

        <div class="row mt centered ">
            <div class="col-lg-4">
                <img src="assets/img/ser01.png" width="180" alt="">
                <h4>1 - Browser Compatibility</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever.</p>
            </div>
            <!--/col-lg-4 -->

            <div class="col-lg-4">
                <img src="assets/img/ser02.png" width="180" alt="">
                <h4>2 - Email Campaigns</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever.</p>

            </div>
            <!--/col-lg-4 -->

            <div class="col-lg-4">
                <img src="assets/img/ser03.png" width="180" alt="">
                <h4>3 - Gather Your Notes</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever.</p>

            </div>
            <!--/col-lg-4 -->
        </div><!-- /row -->
    </div><!-- /container -->

    <div class="container d-none">
        <hr>
        <div class="row centered">
            <div class="col-lg-6 col-lg-offset-3">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter your email address">
                    </div>
                    <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div><!-- /row -->
        <hr>
    </div><!-- /container -->

    <div class="container d-none">
        <div class="row mt centered">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>Flatty is for Everyone.</h1>
                <h3>It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout.</h3>
            </div>
        </div><!-- /row -->

        <! -- CAROUSEL -->
            <div class="row mt centered">
                <div class="col-lg-6 col-lg-offset-3">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('assets/img/p01.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('assets/img/p02.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('assets/img/p03.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
    </div>
    <! --/container -->

        <div class="container d-none">
            <hr>
            <div class="row centered">
                <div class="col-lg-6 col-lg-offset-3">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter your email address">
                        </div>
                        <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div><!-- /row -->
            <hr>
        </div><!-- /container -->

        <div class="container d-none">
            <div class="row mt centered">
                <div class="col-lg-6 col-lg-offset-3">
                    <h1>Our Awesome Team.<br />Design Lovers.</h1>
                    <h3>It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout.</h3>
                </div>
            </div><!-- /row -->

            <div class="row mt centered">
                <div class="col-lg-4">
                    <img class="img-circle" src="assets/img/pic1.jpg" width="140" alt="">
                    <h4>Michael Robson</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever.</p>
                    <p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i
                            class="glyphicon glyphicon-globe"></i></p>
                </div>
                <!--/col-lg-4 -->

                <div class="col-lg-4">
                    <img class="img-circle" src="assets/img/pic2.jpg" width="140" alt="">
                    <h4>Pete Ford</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever.</p>
                    <p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i
                            class="glyphicon glyphicon-globe"></i></p>
                </div>
                <!--/col-lg-4 -->

                <div class="col-lg-4">
                    <img class="img-circle" src="assets/img/pic3.jpg" width="140" alt="">
                    <h4>Angelica Finning</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever.</p>
                    <p><i class="glyphicon glyphicon-send"></i> <i class="glyphicon glyphicon-phone"></i> <i
                            class="glyphicon glyphicon-globe"></i></p>
                </div>
                <!--/col-lg-4 -->
            </div><!-- /row -->
        </div><!-- /container -->

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
