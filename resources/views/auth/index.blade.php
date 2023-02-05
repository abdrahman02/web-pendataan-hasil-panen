<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | DKPPP Lhokseumawe</title>

    {{-- Google Fonts Open Sans --}}
    {{--
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans-Light.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-SemiBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-ExtraBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-LightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-SemiBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/OpenSans/static/OpenSans/OpenSans/OpenSans-ExtraBoldItalic.ttf') }}" rel="stylesheet">
    --}}

    {{-- Google Fonts Poppins --}}
    <link href="{{ asset('fonts/Poppins/Poppins-Black.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-BlackItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraLight.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ExtraLightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Light.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-LightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-SemiBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-SemiBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-Thin.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Poppins/Poppins-ThinItalic.ttf') }}" rel="stylesheet">

    {{-- Google Fonts Nunito --}}
    <link href="{{ asset('fonts/Nunito/static/Nunito-Black.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-BlackItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-Bold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-BoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-ExtraBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-ExtraBoldItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-ExtraLight.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-ExtraLightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-Italic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-Light.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-LightItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-Medium.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-MediumItalic.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-Regular.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-SemiBold.ttf') }}" rel="stylesheet">
    <link href="{{ asset('fonts/Nunito/static/Nunito-SemiBoldItalic.ttf') }}" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ asset('img/logo_pemko_lhokseumawe.png') }}" type="image/x-icon">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('img/logo_pemko_lhokseumawe.png') }}" alt="">
                                    <span class="d-none d-lg-block">DKPPP Lhokseumawe</span>
                                </a>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body shadow-lg">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    {{-- Error Alert --}}
                                    @if (session('loginError'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-1"></i>
                                        {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <form action="{{ route('authenticate') }}" method="POST"
                                        class="row g-3 needs-validation">
                                        @csrf
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-prepend">
                                                    <span class="bi-person fs-4 input-group-text"></span>
                                                </div>
                                                <input type="text" name="username" placeholder="Username"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" required autofocus>
                                                @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <div class="input-group-prepend">
                                                    <span class="bi-lock fs-4 input-group-text"></span>
                                                </div>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required>
                                                @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="copyright">
                                Copyright &copy; {{ date('Y') }}<strong><span> DKPPP</span></strong>. All Rights
                                Reserved
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>