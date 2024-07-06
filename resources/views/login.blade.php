<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Tourism</title>

    <!--Custom Css-->
    <link rel="stylesheet" href="/frontend/CSS/style.css">
    <link rel="stylesheet" href="/frontend/CSS/styles.css">
    <link href="/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/frontend/CSS/bootstrap/css/bootstrap.min.css">
    <!--End Custom Css-->
</head>

<body>
    <br>
    <br>
    <div class="container login-form">
        <div class="row mt-4 justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="offest-md-4">
                            <h1 class="text-center mt-4 mb-4 fw-bolder">Login</h1>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/login-post" method="post" class="form-login">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example1">Email address</label>
                                    <input type="email" id="form2Example1" name="email" class="form-control"
                                        placeholder="E-mail" required />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label " for="form2Example2">Password</label>
                                    <input type="password" id="form2Example2" name="password" class="form-control"
                                        placeholder="Password" />
                                </div>
                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="form2Example31" checked />
                                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('register') }}" class="btn btn-link">Register</a>

                                <!-- Submit button -->
                                <div class="col-md-12">
                                    <button type="submit" class="col-12 btn btn-primary btn-block mb-4">Sign
                                        in</button>
                                </div>

                                <div class="">
                                    <button  href="{{ route('homepage') }}"  class="col-12 btn  btn-block mb-4"> Back </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/frontend/CSS/bootstrap.min.js"></script>
    <script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--=============== MAIN JS ===============-->
    <script src="/frontend/CSS/js/main.js"></script>
</body>

</html>
