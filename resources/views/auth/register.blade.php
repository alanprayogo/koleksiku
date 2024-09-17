<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-8 mx-auto">
                        <div class="auth-form-light px-sm-5 px-4 py-5 text-left">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Sign Up</h4>
                            <form class="pt-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="fullname">Nama Lengkap</label>
                                            <input type="text" class="form-control form-control-lg" id="fullname"
                                                placeholder="Username" name="fullname">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfirmasi Password</label>
                                            <input type="password" class="form-control form-control-lg"
                                                id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-3 gap-2">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="../../index.html">SIGN UP</a>
                                </div>
                                <div class="font-weight-light mt-4 text-center"> Already have an account? <a
                                        href="login.html" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    {{-- custom --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- endcustom --}}
</body>

</html>
