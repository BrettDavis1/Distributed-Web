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
        <b><font size="5">COMEDY    </font> <b><a href="home.html">see all</a>
    </div>


    <div class="w3-container">

        <a href="MovieInfo.html"><img src="Anchorman.jpg" style="width:250px; height:400px;"/></a>
        <a href="MovieInfo.html"><img src="Hot_Fuzz.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="SuperBad.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="The_Hangover.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Shaun_of_the_Dead.jpg" style="width:250px; height:400px;"></a>


    </div>

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " >
        <b><font size="5">ACTION   </font> <b><a href="home.html">see all</a>
    </div>


    <div class="w3-container">

        @foreach($covers as $cover)
            <a href="/movies/{{ $id }}"><img src="{{ $cover }}" style="width:250px; height:400px;"/></a>
        @endforeach

    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " >
        <b><font size="5">DRAMA    </font> <b><a href="home.html">see all</a>
    </div>


    <div class="w3-container">

        <a href="MovieInfo.html"><img src="American_Beauty.jpg" style="width:250px; height:400px;"/></a>
        <a href="MovieInfo.html"><img src="Forrest_Gump.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Saving_Private_Ryan.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="The_Passion.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Titanic.jpg" style="width:250px; height:400px;"></a>




    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " >
        <b><font size="5">HORROR    </font> <b><a href="home.html">see all</a>
    </div>


    <div class="w3-container">

        <a href="MovieInfo.html"><img src="Get_Out.jpg" style="width:250px; height:400px;"/></a>
        <a href="MovieInfo.html"><img src="It_Follows.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="IT.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Shining.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="The_Conjuring.jpg" style="width:250px; height:400px;"></a>




    </div>


    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>

    <div class="w3-container w3-padding-32 " >
        <b><font size="5">SCI-FI    </font> <b><a href="home.html">see all</a>
    </div>


    <div class="w3-container">

        <a href="MovieInfo.html"><img src="Alien.jpg" style="width:250px; height:400px;"/></a>
        <a href="MovieInfo.html"><img src="District_9.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="ex_machina.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Inception.jpg" style="width:250px; height:400px;"></a>
        <a href="MovieInfo.html"><img src="Star_wars.jpg" style="width:250px; height:400px;"></a>




    </div>


    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection

