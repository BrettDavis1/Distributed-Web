@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >

    </div>

    <!--BANNER-->
    <div style= "text-align: center;">
        <img src="black-panther.jpg" style="text-align: center; width: 100%;">
    </div>




    <!--Blank container------------------------------------------------->
    <div class="w3w3-container " style="height:46px;" >

    </div>



    <!--Home page movies display-------------------------------------->

    <div class="w3-container w3-padding-32 " >
        <b><font size="5">NEW RELEASE Blue DVD & Blue-ray  </font> <b><a href="home.html">see all></a>
    </div>


    <div class="w3-container"  >

        @foreach($covers as $cover)
            <a href="/movies/{{ $id }}"><img src="{{ $cover }}" style="width:125px; height:200px;"/></a>
        @endforeach



    </div>

    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection

