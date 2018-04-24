@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >

    </div>

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >

    </div>

    <main class="page payment-page">
        <section class="payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Payment</h2>
                    <p></p>
                </div>
                <form method="POST" action="/checkout">
                    {{ csrf_field() }}
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        @foreach($movies as $movie)

                            <div class="item">
                                <span class="price">${{ $movie['price'] }}</span>
                                <p class="item-name">{{ $movie['item']['Movie_Title'] }}</p>
                                <p class="item-description">{{ $movie['item']['Description'] }}</p>
                            </div>

                        @endforeach

                        <div class="total">Total<span class="price">${{ $total }}</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Credit Card Details</h3>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label for="card-holder">Card Holder</label>
                                <input name="card-holder" id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="">Expiration Date</label>
                                <div class="input-group expiration-date">
                                    <input name="MM" type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                                    <span class="date-separator">/</span>
                                    <input name="YY" type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="card-number">Card Number</label>
                                <input name="card-number" id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="cvc">CVC</label>
                                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">Proceed</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection