<!DOCTYPE html>
<html>
<head>
    <title>Account Statement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> -->
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center">Account Statement</h2>
        <p class="text-center">Account statement from {{ $details['fromDate'] }} to {{ $details['toDate'] }}.</p> 

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Deposits</th>
                    <th>Withdrawals</th>
                    <th>Balance</th>
                  </tr>
            </thead>
            <tbody>
                @if(count($statements) > 0)
                    @foreach($statements as $statement)
                        <tr>
                            <td>{{ $statement->transaction_date }}</td>
                            <td>{{ $statement->description }}</td>
                            <td>{{ $statement->credit }}</td>
                            <td>{{ $statement->debit }}</td>
                            <td>{{ $statement->balance }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No records found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
