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
    <link href="{{ asset('assets/css/form-input.css') }}" rel="stylesheet">


    <!-- Fonts from Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="row shadow p-3 mb-3 bg-body-tertiary mt-5 w-75">
            <div class="col-md-6 offset-md-3">
                <form class="form" method="POST" action="{{ route('submit_verify') }}">
                    @csrf

                    <!-- Password input -->
                    <legend class="mb-3">Setup Password</legend>

                    <div class="mt-3 input-control">
                        <input id="password" type="password" name="password" class="input-field" placeholder="Password"
                            minlength="8" required>
                        <label for="password" class="input-label ">Password</label>
                    </div>

                    <div class="mt-3 input-control">
                        <input id="confirmPassword" type="password" name="confirm_password" class="input-field"
                            minlength="8" placeholder="Confirm Password" required>
                        <label for="confirmPassword" class="input-label ">Confirm Password</label>
                    </div>
                    <div class="alert alert-warning d-none" role="alert">
                        Passwords are not same
                    </div>
                    <input type="hidden" name="student_code" value="{{ $studentCode }}">
                    <!-- Submit button -->
                    <button type="button" class="btn btn-dark btn-block mb-4 w-100">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <p class="centered">Online SES - Built with ♥ - 2022</p>
    </div><!-- /container -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>


    <script>
        let password = document.getElementById('password')
        let confirmPassword = document.getElementById('confirmPassword')
        let submitButton = document.querySelector('[type="button"]')
        let form = document.querySelector('form');
        let alert = document.querySelector('.alert')

        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            form.reportValidity()

            if (password.value && password.value == confirmPassword.value) {
                console.log('same');
                form.submit()

            } else {
                console.log('not same');
                alert.classList.remove('d-none')
            }
        })

        confirmPassword.addEventListener('input', (e) => {
            alert.classList.add('d-none')
        })
    </script>
</body>

</html>
