@extends ('layouts.master')

@section ('content')

    <h2>Movies in Transaction</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Movie Title</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($movies as $movie)

                <tr>
                    <td><a href="/movies/{{ $movie[0]['id'] }}"> {{ $movie[0]['Movie_Title'] }} </a></td>
                    <td>${{ $movie[0]['Price'] }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

    <!--Blank Container-->
    <div class="w3-container " style="height:600px;" >
    </div>
@endsection