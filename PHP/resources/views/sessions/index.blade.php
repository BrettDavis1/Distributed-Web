@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>


    <!--login information area-->
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-card w3-container" style="min-height: 150px; background-color: #8C8EFA; color: #000000;">
            <h1>Login</h1>
            <form method="POST" action="/login">
                {{ csrf_field() }}
                Username:<br>
                <input type="text" name="username">
                <br>
                Password:<br>
                <input type="password" name="password">
                <br><br>
                <button style="cursor:pointer" type="submit">Login</button>
            </form>
        </div>
    </div>

    <!--Blank area-->
    <div class="w3-container " style="height:400px;" >
    </div>

@endsection