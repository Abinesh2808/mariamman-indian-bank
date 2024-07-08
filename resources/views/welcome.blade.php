<!DOCTYPE html>
<html>
<head>
	<title>Mariyamman Indian Bank</title>
	<link rel="stylesheet" href="{{ asset('app.css') }}">
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
	<header class="header">
        <img src="no-background-logo.png" height="150" width="150">
        <span><strong>Welcome to Mariyamman Indian Bank</strong></span>
    </header>
    <div class="title"><marquee behavior="scroll" direction="left" scrollamount="8"><strong>QUICK LINKS</strong></marquee></div>
    <div class="nav-container">
        <div class="nav-column">
            <ul>
                <li><a href="{{ url('register') }}">Register</a></li>
                <li><a href="{{ url('login') }}">Login</a></li>
            </ul>
        </div>
        <div class="nav-column">
            <ul>
                <li><a href="{{ url('whoami') }}">Forgot account number</a></li>
                <li><a href="{{ url('findme') }}">Forgot password</a></li>
            </ul>
        </div>
        <div class="nav-column">
            <ul>
                <li><a href="{{ url('statement') }}">Statement</a></li>
                <li><a href="{{ url('deposit') }}">Deposit</a></li>
                <li><a href="{{ url('withdraw') }}">Withdraw</a></li>
                <li><a href="{{ url('check_balance') }}">Check balance</a></li>
                <li><a href="{{ url('update_account') }}">Update details</a></li>
                <li><a href="{{ url('close_account') }}">Account closure</a></li>
            </ul>
        </div>
        <div class="nav-column">
            <ul>
                <li><a href="{{ url('aboutus') }}">About Us</a></li>
                <li><a href="{{ url('contactus') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</body>
</html>

