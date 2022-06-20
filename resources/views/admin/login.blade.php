<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="icon" type="image/x-icon" href="{{ url('images/logo.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin_assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/superadmin') }}" class="h1"><b>User</b>Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg {{session('error')?'text-danger':''}}">{{session('error')?session('error'):'Sign in to start your session'}}</p>

                <form method="post" action="{{ route('user.login') }}">
                    @csrf
                    <div class="input-group ">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <small class="form-text mt-0 text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </small>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="form-text mt-0 text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </small>
                    <div class="row mt-3">
                        <div class="col-8">
                            <p class="mb-1">
                                <a href="{{ route('password.forgot') }}">Forgot Password</a>
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- AdminLTE App -->
    <script src="{{ url('admin_assets/dist/js/adminlte.js') }}"></script>
</body>

</html>
