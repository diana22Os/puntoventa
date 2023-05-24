<html>
<head>

    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

</head>
<body>
<div class="area">
    @yield('content')
</div>

<nav class="main-menu">
    <ul>
        <li>
            <a href="{{route('inicio')}}">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                           INICIO
                        </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="{{route('productos.index')}}">
                <i class="fa fa-cubes fa-2x"></i>
                <span class="nav-text">
                            PRODUCTOS
                        </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="#">
                <i class="fa fa-tag fa-2x"></i>
                <span class="nav-text">
                            VENTAS
                        </span>
            </a>

        </li>
        <li class="has-subnav">
            <a href="{{route('usuarios.index')}}">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                            USUARIOS
                        </span>
            </a>

        </li>
        <li>
            <a href="#">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                            CLIENTES
                        </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
            <a href="#">
                <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                            Logout
                        </span>
            </a>
        </li>
    </ul>
</nav>


</body>
</html>
