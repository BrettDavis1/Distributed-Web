@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>


    <!--Create account area-->
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-card w3-container" style="min-height: 150px; background-color: #F5F5F5; color: #000000;">
            @if ($errors->any())

                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

            @endif
            <h1>Enter your information to sign up!</h1>
            <form method="POST" action="/register">
                {{ csrf_field() }}
                Name:<br>
                <input type="text" name="name" class="form-control" style="width: auto; margin: auto;"><br>
                Username:<br>
                <input type="text" name="username" class="form-control" style="width: auto; margin: auto;"><br>
                Password:<br>
                <input type="password" name="password" class="form-control" style="width: auto; margin: auto;"><br>
                Confirm Password:<br>
                <input type="password" name="password_confirmation" class="form-control" style="width: auto; margin: auto;"><br>
                Email:<br>
                <input type="email" name="email" class="form-control" style="width: auto; margin: auto;"><br>
                Street Address:<br>
                <input type="text" name="address" class="form-control" style="width: auto; margin: auto;"><br>
                Phone Number<br>
                <input type="tel" name="phone" class="form-control" style="width: auto; margin: auto;"><br>
                <br><button class="btn btn-dark" type="submit">Register</button>
                <p></p>
            </form>
        </div>
    </div>


    <!--Blank Container-->
    <div class="w3-container " style="height:100px;" >
    </div>

@endsection