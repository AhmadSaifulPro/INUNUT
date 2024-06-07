<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/pages-sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Aug 2023 08:30:54 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>Login Siswa</title>

    <link rel="canonical" href="pages-sign-in-2.html" />
    <link rel="shortcut icon" href="{{ asset('/') }}assets/appstack.bootlab.io/img/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('/') }}assets/appstack.bootlab.io/css/light.css" rel="stylesheet">
    <script src="js/settings.js"></script>
    <!-- END SETTINGS -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q3ZYEKLQ68');

    </script>
</head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2">Login Siswa</h1>
                                <p class="lead">
                                    Welcome back!
                                </p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-3">
                                        <div class="row">
                                        </div>
                                        <form action="{{ route('do_loginsiswa')}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">NISN</label>
                                                <input class="form-control form-control-lg" name="nisn" placeholder="Enter your nisn" />
                                            </div>
                                            <div class="mb-5">
                                                <label class="form-label">Password</label>
                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                            </div>
                                            <div class="d-grid gap-2 mt-3 ">
                                                <button class="btn btn-primary rounded" style="height: 125%;" type="submit">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/app.js"></script>

</body>


<!-- Mirrored from appstack.bootlab.io/pages-sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Aug 2023 08:30:55 GMT -->
</html>
