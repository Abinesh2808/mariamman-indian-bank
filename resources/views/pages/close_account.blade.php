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
                        @error('account_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="form-control" required>
                        @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_card_type" class="form-label">ID card type</label>
                        <select id="id_card_type" name="id_card_type" class="form-select" required>
                            <option value="" disabled selected>--- ID card type ---</option>
                            <option value="aadhaar" {{old('id_card_type') == 'aadhaar' ? 'selected' : ''}}>Aadhaar</option>
                            <option value="pan" {{old('id_card_type') == 'pan' ? 'selected' : ''}}>PAN</option>
                            <option value="voter_id" {{old('id_card_type') == 'voter_id' ? 'selected' : ''}}>Voter ID</option>
                        </select>
                        @error('id_card_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_no" class="form-label">ID card number</label>
                        <input type="text" id="id_no" name="id_no" class="form-control" placeholder="Enter your ID card number" value="{{old('id_no')}}" required>
                        @error('id_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Closure</label>
                        <textarea id="reason" name="reason" class="form-control" placeholder="Enter the reason for closing your account" rows="3" required></textarea>
                        @error('reason')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Close Account</button>
                        <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
