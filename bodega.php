<?php
include_once('Cnx.php');

$rsProductos = mysqli_query($Conex, "Select idproducto,descripcion from productos;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("header.php");
    ?>
    <title>Diana Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand  white-text-shadow"><strong>Diana Store</strong></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="bodega.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="busquedabodega.php">Consulta de ventas</a>
                </li>
                <li class="nav-item">
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
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <div class="card shadow border-dark">
                        <div class="card-header bg-dark text-white">
                            <span style="font-weight: 700 !important; font-size:18px">Registro de ventas.</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="txtproducto">Producto:</label>
                                        <select class="selectpicker form-control" data-live-search="true" id="txtproducto">
                                            <?php
                                            while ($dataP = mysqli_fetch_assoc($rsProductos)) {
                                                echo "<option value='" . $dataP["idproducto"] . "'>" . utf8_encode($dataP["descripcion"]) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <label for="txtstock">Stock:</label>
                                        <input type="text" name="" id="txtstock" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtprecio">P. Compra:</label>
                                        <input type="text" name="" id="txtprecioC" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtprecio">P. Venta:</label>
                                        <input type="number" name="" id="txtprecioV" class="form-control" step="0.15">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <div class="form-group">
                                        <label for="txtcantidad">Cantidad:</label>
                                        <input type="number" name="" id="txtcantidad" step="0.10" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group text-center">
                                        <input type="button" value="Guardar" class="btn btn-success ">
                                        <input type="button" value="Limpiar" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mt-3 mb-3 shadow border-dark">
                <div class="card-body">
                    <table id="example" class="table table-striped  table-bordered dt-responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>S/ Total</th>
                                <th>Precio Venta</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>LECHE IDEAL CREMOSITA</td>
                                <td>6.60</td>
                                <td>3.30</td>
                                <td>2</td>
                                <td>21/03/2000</td>
                                <td>4</td>

                            </tr>
                            <tr>
                                <td>AZUCAR</td>
                                <td>4.2</td>
                                <td>2.8</td>
                                <td>1.5</td>
                                <td>24/03/2000</td>
                                <td>6</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
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


            $("#txtproducto").change(function(e) {
                // if (e.which == 13) {
                    var codpro = $("#txtproducto").val();
                    $.ajax({
                        // la URL para la petición
                        url: 'consultas.php',

                        // la información a enviar
                        // (también es posible utilizar una cadena de datos)
                        data: {
                            id: 123
                        },

                        // especifica si será una petición POST o GET
                        type: 'GET',

                        // el tipo de información que se espera de respuesta
                        dataType: 'json',
                        data: {
                            tipo: 'CP',
                            codpro: codpro
                        },

                        // código a ejecutar si la petición es satisfactoria;
                        // la respuesta es pasada como argumento a la función
                        success: function(json) {
                            $("#txtprecioC").val(json.preciocompra);
                            $("#txtprecioV").val(json.precioventa);
                            $("#txtstock").val(json.stock);
                        },

                        // código a ejecutar si la petición falla;
                        // son pasados como argumentos a la función
                        // el objeto de la petición en crudo y código de estatus de la petición
                        error: function(xhr, status) {
                            alert('Disculpe, existió un problema');
                        },

                        // código a ejecutar sin importar si la petición falló o no
                        complete: function(xhr, status) {
                            // alert('Petición realizada');
                        }
                    });
                // }
            });
        });
    </script>
</body>

</html>