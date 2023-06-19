<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/factura.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <title>Factura</title>
</head>

<body>
<div class="container">
    <div class="invoice">
        <div class="row">
            <div class="col-7">
            </div>
            <div class="col-5">
                <h1 class="document-type display-4">FACTURA</h1>
                <p class="text-right"><strong></strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <p>
                    <strong>CERVECERIA OSO SA.CV</strong><br> Teléfono: 55358781<br> Correo:
                    dianaosornio@gmail.com
                </p>
            </div>
            <div class="col-5">
                <br><br><br>
                <p>
                    <strong>Domicilio</strong><br>Col. huertas. <br> lejitos S/N<br>
                </p>
            </div>
        </div>
        <br>
        <br>
        <h6>Factura de productos </h6>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0; // Inicializar la variable total
            ?>
            @foreach ($venta->productos as $producto)
                <tr>
                    <td class="text-center">{{$producto->descripcion }}</td>
                    <td class="text-center">{{ $producto->cantidad }}</td>
                    <td class="text-center">${{ $producto->precio }}</td>
                    <td class="text-center">${{ $producto->cantidad * $producto->precio }}</td>
                </tr>
                    <?php
                    $total += $producto->cantidad * $producto->precio; // Actualizar el total
                    ?>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
                <table class="table table-sm text-right">
                    <tr>
                        <td><strong>TOTAL:</strong></td>
                        <td class="text-right">{{$total}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <br>
        <br>

        <p class="bottom-page text-right">
            <strong>Domicilio</strong><br>Col. huertas. <br> lejitos S/N<br>
        </p>

    </div>
</div>
</body>

</html>
