@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >

    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>









    <!-------List of movies----->
    <div class="w3-container w3-padding-32 " >
        <b><font size="5">COMEDY    </font> <b>
    </div>


    <div class="w3-container">

        @foreach($comedies as $comedy)

            <a href="/movies/{{ $comedy->id }}"><img src="{{ $comedy->image }}" style="width:250px; height:400px;"/></a>

        @endforeach


    </div>

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " style="margin-left:150px; margin-right:150px;>
        <b><font size="5">ACTION   </font> <b>
    </div>


    <div class="w3-container"style="margin-left:150px; margin-right:150px;>

        @foreach($actions as $action)

            <a href="/movies/{{ $action->id }}"><img src="{{ $action->image }}" style="width:215px; height:344px;"/></a>

        @endforeach

    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " style="margin-left:150px; margin-right:150px;>
        <b><font size="5">DRAMA    </font> <b>
    </div>


    <div class="w3-container">

        @foreach($dramas as $drama)

            <a href="/movies/{{ $drama->id }}"><img src="{{ $drama->image }}" style="width:215px; height:344px;"/></a>

        @endforeach




    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " style="margin-left:150px; margin-right:150px;>
        <b><font size="5">HORROR    </font> <b>
    </div>


    <div class="w3-container">

        @foreach($dramas as $drama)

            <a href="/movies/{{ $drama->id }}"><img src="{{ $drama->image }}" style="width:215px; height:344px;"/></a>

        @endforeach




    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " style="margin-left:150px; margin-right:150px;>
        <b><font size="5">SCI-FI    </font> <b>
    </div>


    <div class="w3-container">

        @foreach($scifis as $scifi)

            <a href="/movies/{{ $scifi->id }}"><img src="{{ $scifi->image }}" style="width:215px; height:344px;"/></a>

        @endforeach




    </div>


    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection

