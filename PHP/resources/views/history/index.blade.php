@extends ('layouts.master')

@section ('content')

    <h2>Transactions</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Transaction #</th>
                <th>Total Price</th>
            </tr>
            </thead>
            <tbody>

            @foreach($transactions as $transaction)

                <tr>
                    <td><a href="/history/{{ $transaction->TransactionID }}"> {{ $transaction->TransactionID }} </a></td>
                    <td>${{ $transaction->Total_Charge }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
        <!--Blank container-->
            <div class="w3w3-container " style="height:500px;" >

            </div>

@endsection