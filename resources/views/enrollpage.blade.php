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

    <div id="headerwrap" style="background-color: #EEE; padding-top: 60px;">
        <div class="container">
            <form method="POST" action="{{ route('submit') }}" enctype="multipart/form-data" class="row">
                <div class="col-md-8 offset-md-2">
                    @csrf

                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend>Preferred Course</legend>
                        <div class="mb-3 col-md-12">
                            <select class="form-select" aria-label="Select Preferred Course" name="course" required>
                                <option value="" selected>Select Course...</option>
                                @foreach ($course as $item)
                                    <option value="{{ $item->id }}">{{ $item->course }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend>Personal Info</legend>
                        <div class="mb-3 col-md-4">
                            <label for="inputLname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLname" name="last_name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputFname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFname" name="first_name" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputMname" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="inputMname" name="middle_name" required>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputGender" class="form-label">Sex</label>
                            <select class="form-select" aria-label="Default select example" id="inputGender"
                                name="gender" required>
                                <option value=''>Select Sex...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputCS" class="form-label">Civil Status</label>
                            <input type="text" class="form-control" id="inputCS" name="civil_status" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputNatl" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="inputNatl" name="nationality" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputContact" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" id="inputContact" name="contact_number"
                                required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputBirthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="inputBirthDate" name="birth_date"
                                required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="inputBirthPlace" class="form-label">Birth Place</label>
                            <input type="text" class="form-control" id="inputBirthPlace" name="birth_place"
                                required>
                        </div>
                    </div>
                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend>Document Requirements</legend>
                        <div class="mb-3 col-md-6">
                            <label for="formFile" class="form-label">1 x 1 Picture</label>
                            <input class="form-control" type="file" id="formFile" name="student_picture"
                                required>
                        </div>
                        <button class="btn btn-outline-dark w-100" type="submit">Submit</button>

                    </div><!-- /row -->
                </div>
            </form>
        </div><!-- /container -->
    </div><!-- /headerwrap -->




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
