@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3-container " style="height:46px;" >

    </div>


    <!--Blank container-->
    <div class="w3-container " style="height:46px;" >
    </div>

    <!--Movie title-->
    <div class="w3-container " style="height:46px;" >
        <b><font size="5">{{ $movie->Movie_Title }}   </font> <b>
    </div>

    <!--Movie info container-->
    <div class="w3-cell-row" >
        <div class=" w3-container">
            <img src="{{ $movie->image }}" alt="/Genres/Action/Avengers.jpg"style="width:250px; height:400px;"/>
        </div>
        <div class=" w3-container">
            <form action="/cart" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $movie->id }}">
                <input type="hidden" name="name" value="{{ $movie->Movie_Title }}">
                <input type="hidden" name="price" value="{{ $movie->Price }}">
                <p>{{ $movie->Description }}</p>
                <p>${{ $movie->Price }}</p>
                <br />
                <input type="submit" class="btn btn-dark" value="Add to Cart">
            </form>
        </div>
    </div>


    <div class="w3-container " style="height:100px;" >

    </div>

@endsection





