@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">New savings account</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">First name</label>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your first name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Last name</label>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter your last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Father name</label>
                        <input type="text" id="lname" name="father-name" class="form-control" placeholder="Enter your father name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Mother name</label>
                        <input type="text" id="lname" name="mother-name" class="form-control" placeholder="Enter your mother name">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter your address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Family income</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your family income" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Netbanking password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your netbanking password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <div class="mt-3 text-center">
                    <span>Already have an account? <a href="{{ route('login') }}">Login here</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
