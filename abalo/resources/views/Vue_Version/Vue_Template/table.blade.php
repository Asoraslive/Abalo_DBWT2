<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Datatables</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">


    <style>

        body{
            height: 125vh;
            width: 100vw;
            background: -webkit-linear-gradient(0deg, rgba(166, 213, 220, 0.3), rgba(89, 201, 253, 0.6));
            background: -moz-linear-gradient(0deg, rgba(166, 213, 220, 0.3),rgba(89, 201, 253, 0.6));
            background: -ms-linear-gradient(0deg, rgba(166, 213, 220, 0.3), rgba(89, 201, 253, 0.6));
            background: -o-linear-gradient(0deg, rgba(166, 213, 220, 0.3), rgba(89, 201, 253, 0.6));
            background: linear-gradient(0deg, rgba(166, 213, 220, 0.62), rgba(89, 201, 253, 0.6));
            background-repeat: no-repeat;
        }
        a{
            cursor:pointer;
        }
    </style>
</head>
<body>

<div>
   <site-manager id="app"></site-manager>
</div>



</body>
<script type="module" src="/js/app.js"></script>
</html>
<script>
</script>
