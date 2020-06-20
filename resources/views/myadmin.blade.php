
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="text/css" rel="stylesheet" href="/css/style.css" >
</head>
<header>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                @auth
                <a class="btn btn-sm btn-primary mr-4" href="{{ url('/logout') }}">Logout</a>
                @endauth
            </ul>
        </div>
    </nav>
</header>
<body class="container">
    <div class="wrapper d-flex align-items-stretch ">
        @include('left')
        @yield('containers')
    </div>
</body>


<footer class="footer" id="footer" >
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-left">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted"  href="#">About me</a>
                    </li>

                </ul>
            </div>
            <div class="col-6 text-right">
                <p class="mb-0">
                    © {{date('Y')}} - <a href="#" class="text-muted">Б.Түвшинтөгс</a>
                </p>
            </div>
        </div>
    </div>
</footer>
@yield('js')
<style>
    #footer {
        position: absolute;
        bottom: 0;
        width: 1100px;
        height: 2.5rem;
        /* Footer height */
    }
</style>
