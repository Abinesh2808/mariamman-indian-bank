@extends('layouts.app')

@section('title', 'Update Account')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Update Account</h2>
                <form action="{{ route('update_account') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="address" class="form-label">New Address</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter your new address" rows="3">{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">New Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your new mobile number" value="{{$user->mobile}}">
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">New Email ID</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your new email ID" value="{{$user->email}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
