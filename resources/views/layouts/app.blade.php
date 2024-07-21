<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mariamman Indian Bank</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        header {
        /*background-color: #d6d6d6;*/
            background-color: #f0f2f5;
        }
        .logo-container img {
            height: 150px;
            width: 150px;
        }
        .logo-container span {
            font-size: 1.5rem;
        }
        .card {
            height: 200px;
            background-color: #f2f2f2;
        }
        div.card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          text-align: left;
        }
    </style>
</head>
<body class="position-sticky">
    <header class="row py-1">
        <a class="col-12 col-md-6 d-flex align-items-center logo-container text-decoration-none text-dark" href="/">
            <img src="{{ asset('no-background-logo.png') }}" alt="Bank Logo">
            <span>MARIAMMAN INDIAN BANK</span>
        </a>
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-flex-end align-items-center">
            <ul class="list-inline mb-0">
                <li class="list-inline-item"><a class="text-decoration-none text-muted h6" href="{{ url('login') }}">Netbanking</a></li>
                <li class="list-inline-item"><a class="text-decoration-none text-muted h6" href="{{ url('contactus') }}">Contact Us</a></li>
            </ul>
        </div>
    </header>
    <nav class="navbar-text bg-secondary text-white">
        <marquee behavior="scroll" direction="left" scrollamount="8" class="mt-3"><strong>BANKING AT YOUR FINGERTIPS</strong></marquee>
    </nav>
    <div class="container-fluid mt-1">
        @yield('content')
    </div>
    <footer class="p-4 p-md-5 mt-3 d-flex justify-content-center text-muted">
        <div>
            <span> © 2024 All rights reserved only to <b>Abinesh S.</b></span>
        </div>
    </footer>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
