@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Forgot Password</h2>
                <p>Keep your passwords safe. Don't share your personal information like Debit card details/PIN/CVV/OTP/Card Expiry Date/UPI PIN, over phone mails/e mail/SMS to anyone even though some one pretending to be bank officials. Your bank never asks for such details to customers. Don't click on unknown links sent to you through SMS/emails.</p>
            </div>
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <label for="account_number" class="form-label">Account number</label>
                    <input type="email" id="account_number" name="mobile" class="form-control" placeholder="Enter your account number" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile number</label>
                    <input type="mobile" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>
                    <div class="d-flex justify-content-end">
                        <a id="get-otp-link" class="btn btn-link" href="javascript:void(0);">Get OTP</a>
                    </div>
                </div>      
                <!-- <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your netbanking password" required>
                </div> -->
                <div class="mb-3">
                    OTP:<input type="text" id="otp" name="password" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="verification" class="form-label">Password</label>
                    <input type="text" id="verification" name="verification" class="form-control" placeholder="Enter OTP along with DOB" required>
                    <p class="form-label mt-3 text-secondary">(OTP/DD/MM/YYY)</p>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
                <a href="/" class="btn btn-secondary">Cancel</a>

        </div>
        </div>
    </div>
@endsection
