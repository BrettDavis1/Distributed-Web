@extends ('layouts.master')

@section ('content')

    <!--Blank container-->
    <div class="w3w3-container " style="height:46px;" >
    </div>


    <!--login information area-->
    <div class="w3-row-padding w3-center w3-margin-top">
        <div class="w3-card w3-container" style="min-height: 150px; background-color: #F5F5F5; color: #000000;">
            @if ($errors->any())

                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

            @endif
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <form class="form-signin" method="POST" action="/login">
                {{ csrf_field() }}
                Username:<br>
                <input type="text" name="username" class="form-control" style="width: auto; margin: auto;">
                <br>
                Password:<br>
                <input type="password" name="password" class="form-control" style="width: auto; margin: auto;">
                <br><br>
                <button class="btn btn-dark" type="submit">Login</button>
                <p></p>
            </form>
        </div>
    </div>

    <!--Blank area-->
    <div class="w3-container " style="height:400px;" >
    </div>

@endsection