@extends('layouts.app')

@section('title', 'Deposit Amount')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Deposit Amount</h2>
                <form action="{{ route('deposit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter the amount to deposit" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Deposit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
