@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>


    <!--Create account area-->
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-card w3-container" style="min-height: 150px; background-color: #8C8EFA; color: #000000;">
            <h1>Enter your information to sign up!</h1>
            <form method="POST" action="/register">
                {{ csrf_field() }}
                Name:<br>
                <input type="text" name="name"><br>
                Username:<br>
                <input type="text" name="username"><br>
                Password:<br>
                <input type="password" name="password"><br>
                Confirm Password:<br>
                <input type="password" name="password_confirmation"><br>
                Email:<br>
                <input type="email" name="email"><br>
                Street Address:<br>
                <input type="text" name="address"><br>
                Phone Number<br>
                <input type="tel" name="phone"><br>
                <br><button style="cursor:pointer" type="submit">Register</button>
            </form>
        </div>
    </div>


    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection