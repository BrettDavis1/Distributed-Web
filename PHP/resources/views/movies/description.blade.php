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
            <a href="home.html"><img src="{{ $movie->image }}" alt="/Genres/Action/Avengers.jpg"style="width:250px; height:400px;"/></a>
        </div>
        <div class=" w3-container">
            <p>{{ $movie->Description }}</p>
        </div>
    </div>


    <div class="w3-container " style="height:100px;" >

    </div>

@endsection





