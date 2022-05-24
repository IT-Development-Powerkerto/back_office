<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png">
    <!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&family=Viga&display=swap" rel="stylesheet">

    <title>Back Office Powerkerto</title>
  </head>
  <body>
    <div class="loginlp">
        <div class="lp">
            <h1><span>POWER</span>KERTO</h1>
            <div class="contents">
                <h2>Hello,</h2>
                <p id="welcomeMessage">Welcome Back</p>
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleusername" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control rounded-pill" id="exampleusername" aria-describedby="emailHelp" required autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control rounded-pill" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">

                        <button type="submit" class="btn btn-primary rounded-pill" style="width: 100%">Login</button>
                        <a href="#" class="text-primary py-3" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#forgetPassword">Forget Your Password ?</a>
                        <label class="text-dark" style="font-size: 12px">don't have an account? Click Right <a href="{{ route('register.index') }}" class="text-primary" style="text-decoration: none"> Here</a></label>
                    </div>
                </form>
            </div>
            <footer>
                <label class="fw-bold text-muted mt-n7" style="font-size: 12px">Powered by <span class="text-info">POWER<span class="text-dark">KERTO</span></span></label>
            </footer>
        </div>


        <div class="lr">
            <!-- <h1>Welcome To Powerkerto Back Office!</h1>
            <h2>Don't be busy, be productive!</h2> -->
        </div>
    </div>

    <!-- Modal -->
    <!--begin::Modal - Forget Password-->
    <div class="modal fade" id="forgetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="m-4" action="{{ url('/resetPassword') }}" method="POST">
                @csrf
                @if(session()->has('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('email') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We never share your email with anyone else.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!--end::Modal - Forget Password-->


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4096ccc916.js" crossorigin="anonymous"></script>
    <!-- End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/4096ccc916.js" crossorigin="anonymous"></script>
    <!-- End -->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/custom/modals/create-account.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
    $(function() {
        $('#forgetPassword').modal('show');
    });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            if(sessionStorage.getItem("success")) {
                var div = document.createElement("div");
                div.classList.add("alert");
                div.classList.add("alert-success");
                div.classList.add("alert-dismissible");
                div.classList.add("fade");
                div.classList.add("show");
                div.setAttribute('role', 'alert');
                div.innerHTML = sessionStorage.getItem("success");

                var button = document.createElement("button");
                button.setAttribute('type', 'button');
                button.classList.add("btn-close");
                button.setAttribute('data-bs-dismiss', 'alert');
                button.setAttribute('aria-label', 'Close');

                div.appendChild(button);
                $(div).insertAfter($("#welcomeMessage"));
                sessionStorage.removeItem("success")
            }
        })
    </script>
</body>
</html>
