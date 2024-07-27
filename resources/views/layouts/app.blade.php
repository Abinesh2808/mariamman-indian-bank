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
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: left;
        }
    </style>
</head>
<body class="position-sticky">
    <x-header/>
    <x-navbar data="MARIAMMAN INDIAN BANK - Your Banking Partner !"/>
    <div class="container-fluid mt-1">
        @yield('content')
    </div>
    <x-footer/>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
