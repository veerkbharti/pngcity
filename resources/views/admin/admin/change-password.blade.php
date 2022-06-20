<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technical PTS | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="icon" type="image/x-icon" href="{{ url('images/logo.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/superadmin') }}" class="h1">All<b>PNG</b>Free</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg p-0 {{session('error')?'text-danger':''}}">{{session('error')?session('error'):'Change your Password'}}</p>
                <form method="post" action=" {{ route('password.update') }}">
                    @csrf;
                    <div class="input-group ">
                        <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="form-text mt-0 text-danger">
                        @error('old_password')
                            {{ $message }}
                        @enderror
                    </small>
                    <div class="input-group mt-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
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
                    <div class="input-group mt-3">
                        <input type="password" name="confirm_password" class="form-control"
                            placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small class="form-text mt-0 text-danger">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </small>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Change
                                password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ url('superadmin/login') }}">Login</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- AdminLTE App -->
    <script src="{{ url('admin/dist/js/adminlte.js') }}"></script>
</body>

</html>
