@extends('layouts.app')

@section('title', 'Account Statement')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Account Statement</h2>
                <p>Your account statement from {{ $fromDate }} to {{ $toDate }}.</p>
                <!-- Logic to display statement details -->
            </div>
        </div>
    </div>
@endsection
