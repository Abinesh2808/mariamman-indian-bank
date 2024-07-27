@extends('layouts.app')

@section('title', 'Check Balance')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Check Balance</h2>
                <form action="{{ route('check_balance') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Check Balance</button>
                        <a href="{{route('deposit')}}" class="btn btn-success">Deposit</a>
                        <a href="{{route('withdraw')}}" class="btn btn-danger">Withdraw</a>
                    </div>
                    @if (session('balance'))
                        <div class="alert alert-success">
                            <strong>Available Balance is &nbsp;</strong>&#x20B9; {{session('balance')}}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
