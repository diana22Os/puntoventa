@extends('welcome')
@section('content')
    <div class="container">
        <section class="showcase">
            <header>
                <h2 class="logo">oso</h2>
            </header>

            <div class="overlay"></div>
            <div class="text">
                <h2>CERVECERIA EL OSO</h2>
                <h3>La mejor opcion y calidad</h3>
                <p>Líder en la distribución y venta de cerveza en Jilotepec.</p>
                <p>Actualmente, se vende 17 marcas nacionales, entre las que destacan Corona Extra, la marca más valiosa de América Latina, Modelo Especial, Victoria, Pacífico y Negra Modelo.</p>
                <a href="{{route('productos.index')}}">comprar</a>
            </div>
            <img src="img/cerveza.png" alt="cerveza"/>
        </section>
    </div>
@endsection
