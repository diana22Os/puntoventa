<html lang="es">
<head>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/inicio.css">
    <link href="css/style.css" rel="stylesheet">
    <title>OSO</title>

</head>
<body>
<div class="area">
    @yield('content')
</div>

<nav class="main-menu">
    <ul>
        <li class="mb-3">
            <a href="{{route('inicio')}}">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                           INICIO
                        </span>
            </a>

        </li>
        <li class="has-subnav mb-3">
            <a href="{{route('productos.index')}}">
                <i class="fa fa-product-hunt fa-2x" aria-hidden="true"></i>
                <span class="nav-text">
                            PRODUCTOS
                        </span>
            </a>

        </li>
        <li class="has-subnav mb-3">
            <a href="{{route("vender.index")}}">
                <i class="fa fa-tag fa-2x"></i>
                <span class="nav-text">
                            VENDER
                        </span>
            </a>
        </li>
        <li class="has-subnav mb-3">
            <a href="{{route("ventas.index")}}">
                <i class="fa fa-tag fa-2x"></i>
                <span class="nav-text">
                            VENTAS
                        </span>
            </a>
        </li>
        <li class="has-subnav mb-3">
            <a href="{{route('usuarios.index')}}">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                            USUARIOS
                        </span>
            </a>

        </li>
        <li class="has-subnav mb-3">
            <a href="{{route("clientes.index")}}">
                <i class="fa fa-user fa-2x"></i>
                <span class="nav-text">
                            CLIENTES
                        </span>
            </a>
        </li>
    </ul>

    <ul class="logout mb-2">
        @guest()
            <li class="has-subnav mb-3">
                <a href="{{ route('login') }}">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                            Iniciar sesion
                        </span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                            cerrar session
                        </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest

    </ul>
</nav>
<script src="https://kit.fontawesome.com/f4e52fe305.js" crossorigin="anonymous"></script>

</body>
</html>
