<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once("header.php");
    include_once("utiles.php");
    include_once('Cnx.php');

    $id = $_GET["id"];

    $rsdetalleventa = mysqli_query($Conex, "SELECT p.descripcion, d.precioventa, d.cantidad,ROUND((d.precioventa * d.cantidad),2) AS Total, p.stock, d.fechaventa 
    FROM productos p
    INNER JOIN detalleventas d ON d.idproducto = p.idproducto
    WHERE d.idventas='$id';");
    $filas = mysqli_num_rows($rsdetalleventa);
    ?>
    <title>Diana Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"><strong>Diana Store</strong></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="bodega.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href="busquedabodega.php">Consulta de ventas</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="registrobodega.php">Registro de producto</a>
                </li>
            </ul>
            <div class="flex my-2 my-lg-0">
                <a href="logout.php" style="text-decoration: none;">
                    <span class="text-white m-2">Salir</span>
                    <i class="fa fa-sign-out m-2 text-white" aria-hidden="true" id="salir"></i>
                </a>
            </div>
        </div>
    </nav>
    <section class="mt-2">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <div class="card shadow border-dark">
                        <div class="card-header bg-dark text-white">
                            <span style="font-weight: 700 !important; font-size:18px">Detalle de ventas.</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class='text-center' style="width: 25px;">Item</th>
                                                <th class='text-center'>Producto</th>
                                                <th class='text-center'>Precio. Venta</th>
                                                <th class='text-center'>Cantidad</th>
                                                <th class='text-center'>Total</th>
                                                <th class='text-center'>Stock</th>
                                                <th class='text-center'>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            if ($filas > 0) {
                                                $c = 0;
                                                while ($venta = mysqli_fetch_assoc($rsdetalleventa)) {
                                                    $c = $c + 1;
                                                    echo "<tr>
                                                <td class='text-center'>" . $c . "</td>
                                                <td class='text-center'>" . $venta["descripcion"] . "</td>
                                                <td class='text-center'>S/ " . $venta["precioventa"] . "</td>
                                                <td class='text-center'>" . $venta["cantidad"] . "</td>
                                                <td class='text-center'>S/ " . $venta["Total"] . "</td>
                                                <td class='text-center'>" . $venta["stock"] . "</td>
                                                <td class='text-center'>" . $venta["fechaventa"] . "</td>
                                                </tr>";
                                                }
                                            }


                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                        <a href="busquedabodega.php"> <input type="button" value="Volver" class="btn btn-danger"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <script>
        $(document).ready(function() {
            // $('.selectpicker').selectpicker();
            $('#example1').DataTable();

            $('#example').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos válidos en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No existen registros.",
                    "paginate": {
                        "first": "Primero",
                        "last": "Anterior",
                        "next": "Siguiente",
                        "previous": "Último"
                    }
                }
            });
        });

    </script>
</body>

</html>