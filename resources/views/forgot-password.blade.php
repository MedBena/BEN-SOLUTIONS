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
                                        <div class="card mb-0 border-0 py-3 shadow-none">
                                            <div class="card-body px-0 p-sm-5 m-lg-4">
                                                <div class="text-center mt-2">
                                                    <h5 class="text-primary fs-20">Forgot Password?</h5>
                                                    <p class="text-muted mb-4">Reset password with ben solutions</p>
                                                    <div class="display-5 mb-4 text-danger">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>

                                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                                    Enter your email and instructions will be sent to you!
                                                </div>
                                                <div class="alert alert-borderless alert-success text-center mb-2 mx-2" role="alert" style="display: none">
                                                    We have e-mailed your password rest link check your mail-inbox!
                                                </div>
                                                <div class="p-2">
                                                    <form action="#" method="POST" onsubmit="return false" id="forgot-password-form">    
                                                        @csrf
                                                        <div class="mb-4">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" />
                                                            <div class="invalid-feedback"></div>
                                                        </div>

                                                        <div class="text-center mt-4">
                                                            <button class="btn btn-primary w-100" type="button" onclick="forgotPassword();" id="send-reset">Send Reset Link</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <p class="mb-0">Wait, I remember my password... <a href="{{url('/')}}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="{{asset('assets/app.js')}}"></script>
        <script src="{{asset('assets/js/pages/auth.js')}}"></script>
    </body>
</html>