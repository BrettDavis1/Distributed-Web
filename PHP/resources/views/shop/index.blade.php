@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <!--cart info area-->
    <div class="w3-row-padding w3-center w3-margin-top" style="margin: auto">
            <h1>Cart</h1>

            @if (Session::has('cart') && $totalPrice > 0)

                <div class="row" style="margin: auto">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin: auto">
                        <ul class="list-group" style="margin: auto">
                            @foreach ($movies as $movie)

                                <li class="list-group-item">
                                    <span class="badge">
                                        {{ $movie['qty'] }}
                                    </span>
                                    <strong>
                                        {{ $movie['item']['Movie_Title'] }}
                                    </strong>
                                    <span class="label label-success">
                                        {{ $movie['price'] }}
                                    </span>
                                    <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" id="btnGroupDrop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a href="/reduce/{{ $movie['item']['id'] }}">Remove 1</a> </li>
                                            <li><a href="/remove/{{ $movie['item']['id'] }}">Remove All</a> </li>
                                        </ul>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin: auto">
                        <strong>Total: {{ $totalPrice }}</strong>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" style="margin: auto">
                        <a href="/checkout" type="button" class="btn btn-dark">Checkout</a>
                        <p></p>
                    </div>
                </div>

            @elseif (session()->has('success'))

            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <h2>{{ session()->get('success') }}</h2>
                </div>
            </div>

            @else

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <h2>No Movies in Cart</h2>
                    </div>
                </div>

            @endif
    </div>
        <!--Blank container-->
            <div class="w3w3-container " style="height:600px;" >

            </div>

@endsection