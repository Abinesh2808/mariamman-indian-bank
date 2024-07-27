@extends('layouts.app')

@section('title', 'Withdraw Amount')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h2 class="mb-4">Withdraw Amount</h2>
                <form action="{{ route('withdraw') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" value="{{old('account_number')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" value="{{old('mobile')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter the amount to withdraw" required>
                    </div>
                    <div class="mb-3">
                        <label for="payee" class="form-label">Payee</label>
                        <input type="text" id="payee" name="payee" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </form>
            </div>
        </div>
    </div>
@endsection
