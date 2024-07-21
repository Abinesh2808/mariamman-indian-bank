@extends('layouts.app')

@section('title', 'Close Account')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Close Account</h2>
                <form action="{{ route('close_account') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Closure</label>
                        <textarea id="reason" name="reason" class="form-control" placeholder="Enter the reason for closing your account" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Close Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection
