<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
        <meta charset="utf-8" />
        <title>Sign Up | BEN SOLUTIONS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Minimal Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        <script src="{{asset('assets/js/layout.js')}}"></script>
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <section class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-0">
                                    @include('auth-content')
                                    <div class="col-lg-7">
                                        <div class="card mb-0 border-0 shadow-none">
                                            <div class="card-body px-0 p-sm-5 m-lg-4">
                                                <div class="text-center mt-2">
                                                    <h5 class="text-primary fs-20">Welcome Back !</h5>
                                                    <p class="text-muted">Sign in to continue to ben solutions.</p>
                                                </div>
                                                <div class="p-2 mt-5">
                                                    <form action="#" method="POST" onsubmit="return false" id="authentification-form">    
                                                        @csrf                                            
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{\Cookie::get('username')}}">
                                                            <div class="invalid-feedback"></div>
                                                        </div>                                                
                                                        <div class="mb-3">
                                                            <div class="float-end">
                                                                <a href="{{url('forgot-password')}}" class="text-muted">Forgot password?</a>
                                                            </div>
                                                            <label class="form-label" for="password">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password" value="{{\Cookie::get('password')}}">
                                                                <div class="invalid-feedback"></div>
                                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                            </div>
                                                        </div>                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="auth-remember-check" name="remember" value="remember">
                                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                                        </div>                                                
                                                        <div class="mt-4">
                                                            <button class="btn btn-primary w-100" type="button" onclick="authentification();" id="sign-in">Sign In</button>
                                                        </div>    
                                                    </form>                                                
                                                    <div class="text-center mt-5">
                                                        <p class="mb-0">Don't have an account ? <a href="#" class="fw-semibold text-secondary text-decoration-underline"> SignUp</a> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
        <script src="{{asset('assets/js/pages/passowrd-create.init.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="{{asset('assets/app.js')}}"></script>
        <script src="{{asset('assets/js/pages/auth.js')}}"></script>
    </body>
</html>