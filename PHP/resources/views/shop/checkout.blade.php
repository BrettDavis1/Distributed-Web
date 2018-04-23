@extends ('layouts.master)

@section ('content')

    <div class="row" style="margin: auto">
        <div class="col-sm-6 col-md-6 col-md-offset-4 col-sm-offset-4" style="margin: auto">
            <h1>Checkout</h1>
            <h4>Your Total: ${{ $total }}</h4>
            <form action="/checkout" method="POST">

            </form>
        </div>
    </div>

@endsection