@extends('layouts.app')

@section('title', 'Account Statement')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="mb-4">Account Statement</h2>
                <form action="{{ route('statement') }}" method="GET">
                    <div class="mb-3">
                        <label for="fromDate" class="form-label">From Date</label>
                        <input type="date" id="fromDate" name="fromDate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="toDate" class="form-label">To Date</label>
                        <input type="date" id="toDate" name="toDate" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Get Statement</button>
                </form>
            </div>
        </div>
    </div>
@endsection
