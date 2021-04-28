<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/cookiecheck.js')}}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('more_script')
    @yield('more_css')

</head>
<body>
<nav class="navbar navbar-light bg-light justify-content-around">
    @include('Templates/jsnav')
        <img  src="{{asset('img/abalo_logo.png')}}" alt="" width="auto" height="200" >
        <div>Logged in as ...</div>
</nav>

@yield('content')

<div class="modal fade cookieModal" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="cookieModalLabel">Cookie Information</h2>
            </div>
            <div class="modal-body">
                <h4>Cookie Policy</h4>
                <p>Wir nutzen Cookies auf unserer Website.</p>
                <p>
                    <a href="https://dsgvo-gesetz.de/" target="_blank">Klick hier um die Richtlinien des DSGVOs zu sehen!</a>
                </p>
            </div>
            <div class="modal-footer">
                <button id="cookieModalConsent" type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" onclick="cookieConsent()">Akzeptieren</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
