@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Forgot Password</h2>
                <p>Keep your passwords safe. Don’t share your personal information like Debit card details/PIN/CVV/OTP/Card Expiry Date/UPI PIN, over phone mails/e mail/SMS to anyone even though someone pretending to be bank officials. Your bank never asks for such details from customers. Don’t click on unknown links sent to you through SMS/emails.</p>
            </div>
            <div class="col-12 col-md-8">
                <form action="{{ route('findme') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" value="{{ old('account_number') }}" placeholder="Enter your account number" required>
                        @error('account_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="Enter your mobile number" required>
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of birth</label>
                        <input type="date" id="dob" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
                        @error('date_of_birth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                    <a href="{{ url('dashboard') }}" class="btn btn-warning">Cancel</a>
                </form>
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
