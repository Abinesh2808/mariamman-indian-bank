@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <div class="mt-2">
                            <div class="mb-2">
                                <strong>Account Number:</strong> {{ session('account_number') }}<br>
                                <strong>Customer ID:</strong> {{ session('customer_id') }} <br>
                            </div>
                            <div class="mt-2 mb-2">
                                <span>Go back to Login page and login with your Customer ID/Phone number/Account number and password </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-primary" style="margin-right: 10px;">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-danger">Create another account</a>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(!session('success'))
                    <h2 class="mb-4">New savings account</h2>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="fname" class="form-label">First name</label>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your first name" value="{{ old('fname') }}" required>
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lname" class="form-label">Last name</label>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter your last name" value="{{ old('lname') }}" required>
                            @error('lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="father_name" class="form-label">Father name</label>
                            <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Enter your father name" value="{{ old('father_name') }}" required>
                            @error('father_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mother_name" class="form-label">Mother name</label>
                            <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Enter your mother name" value="{{ old('mother_name') }}">
                            @error('mother_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of birth</label>
                            <input type="date" id="dob" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
                            @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile number</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" value="{{ old('mobile') }}" required>
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-control" placeholder="Enter your address" rows="3" required>{{ old('address') }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_card_type" class="form-label">ID card type</label>
                            <select id="id_card_type" name="id_card_type" class="form-select" required>
                                <option value="" disabled selected>--- ID card type ---</option>
                                <option value="aadhaar" {{ old('id_card_type') == 'aadhaar' ? 'selected' : '' }}>Aadhaar</option>
                                <option value="pan" {{ old('id_card_type') == 'pan' ? 'selected' : '' }}>PAN</option>
                                <option value="voter_id" {{ old('id_card_type') == 'voter_id' ? 'selected' : '' }}>Voter ID</option>
                            </select>
                            @error('id_card_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_no" class="form-label">ID card number</label>
                            <input type="text" id="id_no" name="id_no" class="form-control" placeholder="Enter your ID card number" value="{{ old('id_no') }}" required>
                            @error('id_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="family_income" class="form-label">Family income</label>
                            <input type="text" id="family_income" name="family_income" class="form-control" placeholder="Enter your family income" value="{{ old('family_income') }}" required>
                            @error('family_income')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Netbanking password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your netbanking password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>

                    </form>
                    <div class="mt-3 text-center">
                        <span>Already have an account? <a href="{{ route('login') }}">Login here</a></span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


