@extends('layouts.app')

@section('title', 'Deposit Amount')

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
                <h2 class="mb-4">Deposit Amount</h2>
                <form action="{{ route('deposit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" value="{{old('account_number')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter the amount to deposit" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payer" class="form-label">Payer</label>
                        <input type="text" id="payer" name="payer" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Deposit</button>
                        <a href="{{route('check_balance')}}" class="btn btn-primary">Check Balance</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
