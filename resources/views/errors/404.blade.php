<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Error</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/error/css/font-awesome.min.css') }}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/templates/error/css/style.css') }}" />
</head>

<body>
    <div id="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Terdapat Kesalahan</h2>
            <p>Halaman tidak dapat dimuat karena terjadi kesalahan.</p>
            <p>Silahkan hubungi admin untuk info lebih lanjut.</p>
            <a href="{{ url('/dashboard') }}">Beranda</a>
        </div>
    </div>
</body>

</html>
