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

    <x-navbar />

    <div id="headerwrap" style="background-color: #EEE; padding-top: 60px;">
        <div class="container">

            <h1 class="text-dark text-center">Registration</h1>

            <form class="form row" method="POST" action="{{ route('submit') }}" enctype="multipart/form-data">
                <div class="col-md-8 offset-md-2">
                    @csrf

                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend class="mb-3">Preferred Course</legend>
                        <div class="mb-3 col-md-12">
                            <div class="input-control">
                                <select id="categorySelect" name="course" class="input-field"
                                    placeholder="Select Preferred Course" required>
                                    <option value="" selected>Select Course...</option>
                                    @foreach ($course as $item)
                                        <option value="{{ $item->id }}">{{ $item->course }}</option>
                                    @endforeach
                                </select>
                                <label for="categorySelect" class="input-label">Course</label>
                            </div>
                        </div>
                    </div>
                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend class="mb-3">Personal Info</legend>

                        <div class="mb-3 col-md-4">
                            <div class="input-control">
                                <input id="inputLname" type="text" name="last_name" class="input-field"
                                    placeholder="Last name" required>
                                <label for="inputLname" class="input-label">Last name</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="input-control">
                                <input id="inputFname" type="text" name="first_name" class="input-field"
                                    placeholder="First name" required>
                                <label for="inputFname" class="input-label">First name</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <div class="input-control">
                                <input id="inputMname" type="text" name="middle_name" class="input-field"
                                    placeholder="Middle name" required>
                                <label for="inputMname" class="input-label">Middle name</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <div class="input-control">
                                <input id="inputAddress" type="text" name="address" class="input-field"
                                    placeholder="Address" required>
                                <label for="inputAddress" class="input-label">Address</label>
                            </div>
                        </div>

                        <div class="mb-3 col-md-6">

                            <div class="input-control">
                                <select id="inputGender" name="gender" class="input-field" placeholder="Select Sex"
                                    required>
                                    <option value=''>Select Sex...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="inputGender" class="input-label">Sex</label>
                            </div>

                            {{-- <label for="inputGender" class="form-label">Sex</label>
                            <select class="form-select" aria-label="Default select example" id="inputGender"
                                name="gender" required>
                                <option value=''>Select Sex...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> --}}
                        </div>

                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputCS" type="text" name="civil_status" class="input-field"
                                    placeholder="Civil Status" required>
                                <label for="inputCS" class="input-label">Civil Status</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputNatl" type="text" name="nationality" class="input-field"
                                    placeholder="Nationality" required>
                                <label for="inputNatl" class="input-label">Nationality</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputContact" type="number" name="contact_number" class="input-field"
                                    placeholder="Contact Number" required>
                                <label for="inputContact" class="input-label">Contact Number</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputEmail" type="email" name="email" class="input-field"
                                    placeholder="Email Address" required>
                                <label for="inputEmail" class="input-label">Email Address</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputBirthDate" type="date" name="birth_date" class="input-field"
                                    placeholder="Birth Date" required>
                                <label for="inputBirthDate" class="input-label">Birth Date</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input id="inputBirthPlace" type="text" name="birth_place" class="input-field"
                                    placeholder="Birth Place" required>
                                <label for="inputBirthPlace" class="input-label">Birth Place</label>
                            </div>
                        </div>
                    </div>
                    <div class="row shadow p-3 mb-3 bg-body-tertiary">
                        <legend class="mb-3">Document Requirements</legend>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input class="input-field" type="file" id="formFileStudentPicture"
                                    name="student_picture" accept="image/png, image/gif, image/jpeg" required>
                                <label for="formFileStudentPicture" class="input-label">1 x 1 Picture</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input class="input-field" type="file" id="formFileStudentTor" name="student_tor"
                                    accept="image/png, image/gif, image/jpeg" required>
                                <label for="formFileStudentTor" class="input-label">Form 137 / Transcript of
                                    Record</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input class="input-field" type="file" id="formFileStudentHon" name="student_hon"
                                    accept="image/png, image/gif, image/jpeg" required>
                                <label for="formFileStudentHon" class="input-label">Form 138 / Hon. Dismissal</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input class="input-field" type="file" id="formFileStudentGmc" name="student_gmc"
                                    accept="image/png, image/gif, image/jpeg" required>
                                <label for="formFileStudentGmc" class="input-label">Good Moral Character</label>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-control">
                                <input class="input-field" type="file" id="formFileStudentPsa" name="student_psa"
                                    accept="image/png, image/gif, image/jpeg" required>
                                <label for="formFileStudentPsa" class="input-label">PSA Birth Certificate / NSO
                                    (Photocopy)</label>
                            </div>
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
