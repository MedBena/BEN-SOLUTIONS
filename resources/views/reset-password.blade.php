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
                                        @if ($check)
                                            <div class="card mb-0 border-0 shadow-none">
                                                <div class="card-body px-0 p-sm-5 m-lg-4">
                                                    <div class="text-center">
                                                        <h5 class="text-primary fs-20">Create new password</h5>
                                                        <p class="text-muted mb-5">Your new password must be different from previous used password.</p>
                                                    </div>                                                
                                                    <div class="p-2">
                                                        <form action="#" method="POST" onsubmit="return false" id="reset-password-form">    
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label" for="password">Password</label>
                                                                <div class="position-relative auth-pass-inputgroup">
                                                                    <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="new_password" required>
                                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                                </div>
                                                                <div class="invalid-feedback"></div>
                                                                <div id="passwordInput" class="form-text">Your password must be 8-20 characters long.</div>
                                                            </div>
                                                    
                                                            <div class="mb-3">
                                                                <label class="form-label" for="confirm-password-input">Confirm Password</label>
                                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                                    <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm-password-input" name="confirm_password" required>
                                                                    <div class="invalid-feedback"></div>
                                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-input"><i class="ri-eye-fill align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                    
                                                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                                <h5 class="fs-13">Password must contain:</h5>
                                                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                                            </div>
                                                    
                                                            <div class="mt-4">
                                                                <button class="btn btn-primary w-100" type="button" id="reset-password" onclick="resetPassword()">Reset Password</button>
                                                            </div>
                                                            <input type="hidden" name="token" value="{{$token}}">
                                                        </form>
                                                    </div>  
                                                    <div class="mt-4 text-center">
                                                        <p class="mb-0">Wait, I remember my password... <a href="{{url('/')}}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card mb-0 border-0 py-3 shadow-none">
                                                <div class="card-body px-0 p-sm-5 m-lg-4 text-center">
                                                    <div class="avatar-lg mx-auto mt-2">
                                                        <div class="avatar-title bg-card-custom text-warning display-3 rounded-circle">
                                                            <i class="bi bi-emoji-frown"></i>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 pt-2">
                                                        <h4>Your token has expired</h4>
                                                        <p class="text-muted mx-4">We'll need to re-send you new token for reset password.</p>
                                                        <div class="mt-4">
                                                            <a href="{{url('/forgot-password')}}" class="btn btn-warning w-100">Try Again</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
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