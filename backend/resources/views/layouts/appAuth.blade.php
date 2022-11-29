<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Log In | UBold - Responsive Admin Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
@notifyCss
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<link href="{{ asset('assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
<link href="{{ asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="loading auth-fluid-pages pb-0">
    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <div class="auth-brand text-center text-lg-start">
                        <div class="auth-logo">
                            <a href="/" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="" class="rounded-circle" height="60px" width="60px">
                                </span>
                            </a>
                        </div>
                    </div>
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3 text-white">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> I've been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need. <i class="mdi mdi-format-quote-close"></i>
                </p>
                <h5 class="text-white">- Fadlisaad (Ubold Admin User)</h5>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <x:notify-messages />
@notifyJs
</body>
</html>
