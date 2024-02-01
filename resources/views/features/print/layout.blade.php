<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print | @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container-xl mt-4">
        <div class="row border-bottom mb-3">
            <h2 class="h3 fw-bold mb-1 text-center text-uppercase">PT. ABCD </h2>
            {{-- <p class="h6 fw-bold mb-1 text-center text-uppercase">Jl. Mekar, - Gresik 61112</p> --}}
            <p class="h6 fw-bold mb-3 text-center text-uppercase">Jawa Timur - Indonesia</p>
        </div>

        <div class="content-wrapper">
            @yield('content')

            <footer class="content-footer footer">
                <p class="mt-3 mb-0">Dibuat pada:</p>
                <p>Gresik, {{ Date::now() }}</p>
            </footer>
        </div>

    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
