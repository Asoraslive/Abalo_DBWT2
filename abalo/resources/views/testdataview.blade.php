<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ab_TestData</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light justify-content-center">
    <img src="{{asset('img/abalo_logo.png')}}" alt="" width="auto" height="200" class="">

</nav>
        @if($testdatas ?? null)
            <table class="table table-sm">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ab_TestName</th>
                </tr>
                </thead>
                <tbody>
            @foreach($testdatas as $testdata)
                <tr>
                    <th scope="row">{{$testdata->id}}</th>
                    <td>{{$testdata->ab_testname}}</td>
                </tr>
            @endforeach
        @else
        </tbody>
    </table>
    <div class="alert alert-danger">
        <strong>Fehler?</strong> Es ist keine Liste Vorhanden.
    </div>
    @endif
</body>
</html>
