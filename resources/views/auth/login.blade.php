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
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light px-sm-5 px-4 py-5 text-left">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Sign In</h4>
                            <form class="pt-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        placeholder="Password" name="password">
                                </div>
                                <div class="d-grid mt-3 gap-2">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="../../index.html">SIGN IN</a>
                                </div>
                                <div class="font-weight-light mt-4 text-center"> Already have an account? <a
                                        href="login.html" class="text-primary">Register</a>
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
    @push('js')
        <script>
            $(document).ready(function() {
                $('#login').on('submit', function(event) {
                    event.preventDefault();
                    var form = $(this);
                    // Menonaktifkan tombol submit 
                    form.find('button[type="submit"]').prop('disabled', true);

                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            // Jika validasi berhasil, redirect atau lakukan tindakan lain
                            Swal.fire({
                                title: 'Success',
                                text: response.success,
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then((result) => {
                                window.location.href = response.redirect;
                            });
                        },
                        error: function(xhr) {
                            // Jika validasi gagal, tampilkan pesan kesalahan menggunakan SweetAlert
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';

                            if (Array.isArray(errors)) {
                                // Jika errors adalah array (validasi gagal)
                                $.each(errors, function(index, value) {
                                    errorMessage += value + '<br>';
                                });
                            } else {
                                // Jika errors adalah string (autentikasi gagal)
                                errorMessage = errors;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                html: errorMessage
                            });

                            // Mengaktifkan kembali tombol submit 
                            form.find('button[type="submit"]').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        timer: 2500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
        @if (session('failed'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: '{{ session('failed') }}',
                    });
                });
            </script>
        @endif
    @endpush
    {{-- endcustom --}}
</body>

</html>
