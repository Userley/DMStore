<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once("header.php");
    include_once("utiles.php");
    include_once('Cnx.php');

    $id = $_GET["id"];

    $rsdetalleventa = mysqli_query($Conex, "Select * from categoria;");

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
                <form action="registrobodega.php" method="POST">
                <div class="col-sm-12 col-md-10 col-lg-10 ">
                        <div class="card shadow border-dark">
                            <div class="card-header bg-dark text-white">
                                <span style="font-weight: 700 !important; font-size:18px">Edición de producto.</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="txtdescripcion">Producto:</label>
                                            <input type="text" name="txtdescripcion" value='<?php echo $dtopro['descripcion'] ?>' id="txtdescripcion" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="ddlcategoria">Categoría:</label>
                                            <select class="form-control" id="ddlcategoria" name="ddlcategoria">
                                                <?php
                                                while ($dataC = mysqli_fetch_assoc($rsCategorias)) {
                                                    if ($dataC['idcategoria'] == $dtopro['idcategoria']) {
                                                        # code...
                                                        echo "<option value='" . $dataC["idcategoria"] . "' selected='selected'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                    } else {
                                                        echo "<option value='" . $dataC["idcategoria"] . "'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtcantidad">Cantidad:</label>
                                            <input type="number" name="txtcantidad" id="txtcantidad" class="form-control" value='<?php echo $dtopro['Stock'] ?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="ddlundmedida">Medida:</label>
                                            <select class="form-control" id="ddlundmedida" name="ddlundmedida">
                                                <?php
                                                while ($dataC = mysqli_fetch_assoc($rsmedidas)) {
                                                    if ($dataC['idundmedida'] == $dtopro['idundmedida']) {
                                                        echo "<option value='" . $dataC["idundmedida"] . "' selected='selected'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                    } else {
                                                        echo "<option value='" . $dataC["idundmedida"] . "'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtpreciocompra">Prec. Costo:</label>
                                            <input type="number" name="txtpreciocompra" id="txtpreciocompra" class="form-control" step="0.01" value='<?php echo $dtopro['preciocompra'] ?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtprecioventa">Prec. Venta:</label>
                                            <input type="number" name="txtprecioventa" id="txtprecioventa" class="form-control" step="0.01" value='<?php echo $dtopro['precioventa'] ?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="btn-group">
                                            <input type="submit" value="Guardar" name="btnguardar" class="btn btn-success ">
                                            <a href="busquedabodega.php"> <input type="button" value="Volver" class="btn btn-danger"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script>
        $(document).ready(function() {
            // $('.selectpicker').selectpicker();
            $('#example').DataTable();


            $('#txtfecha1').val(today);
            $('#txtfecha2').val(today);

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


        function GetDataVentas() {
var codventa =$('').val();


            $.ajax({
                // la URL para la petición
                url: 'consultas.php',

                // especifica si será una petición POST o GET
                type: 'GET',

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: {
                    tipo: 'CV',
                    codventa: codventa,
                },

                // el tipo de información que se espera de respuesta
                dataType: 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success: function(json) {

                    var rspta = JSON.parse(json);

                    if (rspta.estado == "OK") {
                        alert("¡Registro exitoso!");
                        location.reload();
                    } else {
                        alert("Error de registro.");
                    }
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
        }
    </script>
</body>

</html>