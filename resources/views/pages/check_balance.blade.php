@extends('layouts.app')

@section('title', 'Check Balance')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Check Balance</h2>
                <form action="{{ route('check_balance') }}" method="GET">
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Check Balance</button>
                </form>
            </div>
        </div>
    </div>
@endsection
