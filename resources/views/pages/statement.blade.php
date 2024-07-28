@extends('layouts.app')

@section('title', 'Account Statement')

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
                <h2 class="mb-4">Account Statement</h2>
                <form action="{{ route('statement') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Enter your account number" value="{{request('account_number')}}" required>
                        @error('account_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" value="{{request('mobile')}}" required>
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fromDate" class="form-label">From Date</label>
                        <input type="date" id="fromDate" name="fromDate" class="form-control" value="{{request('fromDate')}}">
                        @error('from_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="toDate" class="form-label">To Date</label>
                        <input type="date" id="toDate" name="toDate" class="form-control" value="{{request('toDate')}}">
                        @error('to_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Get Statement</button>
                    <a href="{{url('dashboard')}}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    @if ($account_statement)    
        <div class="container mt-5 justify-content-center col-12 col-md-8 px-lg-4">
            <h2>Account Statement</h2>
            <div class="table-responsive">
                <table class="table table-hover table-sm small">
                    <thead  class="thead-dark">
                      <tr>
                        <th>Date</th>
                        <th>Particulars</th>
                        <th>Deposits</th>
                        <th>Withdrawals</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($account_statement) > 0)
                            @foreach($account_statement as $statements)
                              <tr>
                                <td>{{$statements->transaction_date}}</td>
                                <td>{{$statements->description}}</td>
                                <td>{{$statements->credit}}</td>
                                <td>{{$statements->debit}}</td>
                                <td>{{$statements->balance}}</td>
                              </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No transactions found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $account_statement->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
            </div>
            <div>
                <a href="{{route('statement.pdf', ['account_number' => request('account_number'),
                                                    'mobile' => request('mobile'),
                                                    'fromDate' => request('fromDate'),
                                                    'toDate' => request('toDate')])}}" 
                                                    class="btn btn-success">Export to PDF</a>
                <a href="{{route('statement.email', ['account_number' => request('account_number'),
                                                    'mobile' => request('mobile'),
                                                    'fromDate' => request('fromDate'),
                                                    'toDate' => request('toDate')])}}" 
                                                    class="btn btn-danger">Send via Email</a>
            </div>
        </div>
        
    @endif
@endsection
