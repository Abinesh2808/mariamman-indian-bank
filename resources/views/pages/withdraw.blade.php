@extends('layouts.app')

@section('title', 'Withdraw Amount')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h2 class="mb-4">Withdraw Amount</h2>
                <form action="{{ route('withdraw') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" value="{{old('account_number')}}" required>
                        @error('account_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" value="{{old('mobile')}}" required>
                        @error('amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter the amount to withdraw" required>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="payee" class="form-label">Payee</label>
                        <input type="text" id="payee" name="payee" class="form-control" placeholder="Enter your name" required>
                        @error('payee')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Withdraw</button>
                        <a href="{{url('check_balance')}}" class="btn btn-primary">Check Balance</a>
                       <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
