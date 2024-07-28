@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Reset Password</h2>
                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="account_number" value="{{ $account_number }}">
                    
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter new password" required>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
                        @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                    <a href="{{ url('login') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
