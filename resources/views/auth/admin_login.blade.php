<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box animate__animated animate__zoomIn">
        <div class="login-logo">
            <a href="#"><b>Admin</b>SingIn</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Signin with valid email & password</p>

                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-info">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-info btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @include('layouts.scripts')
</body>

</html>
