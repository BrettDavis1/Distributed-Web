@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >

    </div>

    <!--BANNER-->
    <div style= "text-align: center;">
        <a href="/movies/{{ $bp->id }}"><img src="black-panther.jgp" style="text-align: center; width: 100%;"></a>
    </div>




    <!--Blank container------------------------------------------------->
    <div class="w3w3-container " style="height:46px;" >

    </div>



    <!--Home page movies display-------------------------------------->

    <div class="w3-container w3-padding-32 " style="margin-left:150px; margin-right:150px;">
        <b><font size="5">NEW RELEASE Blue DVD & Blue-ray  </font> <b><a href="/movies">see all></a>
    </div>


    <div class="w3-container"  style="margin-left:150px; margin-right:150px;">

        @foreach($movies as $movie)
            <a href="/movies/{{ $movie->id }}"><img src="{{ $movie->image }}" style="width:125px; height:200px;"/></a>
        @endforeach

    </div>

    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection

