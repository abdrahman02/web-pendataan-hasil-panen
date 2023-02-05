<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | DKPPP Lhokseumawe</title>

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

    @include('dashboard.layouts.header')
    @include('dashboard.layouts.sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            {{-- Alert Error --}}
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-octagon me-1"></i> {{ $error }}</li>
                    @endforeach
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('isi')
        </section>
    </main>
    <!-- End #main -->

    <br>
    <br>
    <br>
    <br>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            Copyright &copy; {{ date('Y') }}<strong><span> DKPPP</span></strong>. All Rights
            Reserved
        </div>
    </footer>
    <!-- End Footer -->

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