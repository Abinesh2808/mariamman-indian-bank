@extends('layouts.app')

@section('title', 'Forgot Account Number')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="mb-3">
                    <h2 class="mb-4">Forgot Account Number</h2>
                    <p>Keep your accounts safe. Don't share your personal information like Debit card details/PIN/CVV/OTP/Card Expiry Date/UPI PIN, over phone mails/e mail/SMS to anyone even though some one pretending to be bank officials. Your bank never asks for such details to customers. Don't click on unknown links sent to you through SMS/emails.</p>
                    <p>Why did you forgot your account number ? </p>
                    <textarea class="form-control" rows="3" required></textarea><br>
                    <input type="checkbox" name="NRI">
                        Is it a NRI Account ? <br>
                </div>      
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile number</label>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" required>
                </div>      
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your netbanking password">
                </div>
                <button type="submit" class="btn btn-primary">Show Account Number</button>
                <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
            </div>
        </div>
    </div>
@endsection
