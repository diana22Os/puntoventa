@extends("welcome")
@section("content")
    <link rel="stylesheet" href="../css/inicio.css">
    <link href="../css/style.css" rel="stylesheet">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Nueva venta <i class="fa fa-cart-plus"></i></h1>
                @include("notificacion")
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="{{route("terminarOCancelarVenta")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="id_cliente">Cliente</label>
                                <select required class="form-control" name="id_cliente" id="id_cliente">
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="importe">Importe</label>
                                <input id="importe" name="importe" type="number" step="1" class="form-control" value="30" required>
                            </div>
                            @if(session("productos") !== null)
                                <div class="form-group">
                                    <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                        venta
                                    </button>
                                    <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                        venta
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="{{route("agregarProductoVenta")}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="codigo">Código de barras</label>
                                <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                       class="form-control"
                                       placeholder="Código de barras">
                            </div>
                        </form>
                    </div>
                </div>
                @if(session("productos") !== null)
                    @php
                        $subtotal = 0;
                        foreach(session("productos") as $producto) {
                            $subtotal += $producto->precio_venta * $producto->cantidad;
                        }
                        $total = $subtotal + 30; // Suma el costo del importe al subtotal
                    @endphp
                    <h3>Subtotal: $<span id="subtotal">{{number_format($subtotal, 2)}}</span></h3>
                    <h3>Total: $<span id="total">{{number_format($total, 2)}}</span></h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Código de barras</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Quitar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(session("productos") as $producto)
                                <tr>
                                    <td>{{$producto->codigo_barras}}</td>
                                    <td>{{$producto->descripcion}}</td>
                                    <td>${{number_format($producto->precio_venta, 2)}}</td>
                                    <td>{{$producto->cantidad}}</td>
                                    <td>
                                        <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                            @method("delete")
                                            @csrf
                                            <input type="hidden" name="indice" value="{{$loop->index}}">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h2>Aquí aparecerán los productos de la venta
                        <br>
                        Escanea el código de barras o escribe y presiona Enter</h2>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Capturar el evento de cambio en el campo de importe
        const importeInput = document.getElementById('importe');
        importeInput.addEventListener('change', calcularTotales);

        function calcularTotales() {
            const importe = parseFloat(importeInput.value);
            const subtotal = parseFloat(document.getElementById('subtotal').innerText);
            const total = subtotal + importe;

            document.getElementById('total').innerText = total.toFixed(2);
        }
    </script>
@endsection
