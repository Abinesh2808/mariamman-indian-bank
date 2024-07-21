<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mariamman Indian Bank - Dashboard</title>
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
            background-color: #f2f2f2;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: left;
            /*margin-bottom: 20px;*/
            height:250px;
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
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12 col-md-11 p-md-2 ms-md-4">
                <h5 class="h4 mt-5">Welcome to Mariamman Indian Bank</h5>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At Mariamman Indian Bank, we are dedicated to delivering the highest quality banking experience to our valued customers. Whether you're opening a new account, managing your savings, or exploring investment opportunities, we have a wide range of services designed to meet your needs.</p>
            </div>
        </div>
        <div class="row px-4 m-2 mx-md-4">
            <div class="col-12 col-md-6 p-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <ul class="list-inline">
                            <li><a class="text-decoration-none m-3" href="{{ url('statement') }}">Account Statement</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('deposit') }}">Deposit Amount</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('withdraw') }}">Withdraw Amount</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('check_balance') }}">Check Balance</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('update_account') }}">Update Profile</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('close_account') }}">Account Closure</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 p-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Get in touch with us</h5>
                        <ul class="list-inline p-1">
                            <li><a class="text-decoration-none m-3" href="{{ url('aboutus') }}">About Us</a></li>
                            <li><a class="text-decoration-none m-3" href="{{ url('contactus') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Latest News</h5>
                        <p class="card-text">Stay updated with the latest news and announcements from Mariamman Indian Bank. We strive to keep you informed about our newest services and offers.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Promotional Offers</h5>
                        <p class="card-text">Check out our latest promotional offers and take advantage of special rates and benefits designed just for you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="p-4 p-md-5 mt-3 d-flex justify-content-center text-muted">
        <div>
            <span> © 2024 All rights reserved only to <b>Abinesh S.</b></span>
        </div>
    </footer>
</body>
</html>
