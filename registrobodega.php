<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once("header.php");
    include_once("utiles.php");
    include_once('Cnx.php');
    $rsCategorias = mysqli_query($Conex, "Select * from categoria;");
    $rsmedidas = mysqli_query($Conex, "Select * from unidadmedida;");
    $rsLstProducto = mysqli_query($Conex, "SELECT p.idproducto,p.descripcion,c.descripcion AS categor ,p.preciocompra, p.Stock, u.descripcion AS unidad, p.precioventa FROM productos p
                                            INNER JOIN categoria c ON c.idcategoria = p.idcategoria
                                            INNER JOIN unidadmedida u ON u.idundmedida = p.idundmedida;");

    if (isset($_POST["btnguardar"])) {
        $descripcion = $_POST["txtdescripcion"];
        $categoria = $_POST["ddlcategoria"];
        $preciocompra = $_POST["txtpreciocompra"];
        $cantidad = $_POST["txtcantidad"];
        $undmedida = $_POST["ddlundmedida"];
        $precioventa = $_POST["txtprecioventa"];

        if (empty($descripcion) || empty($preciocompra) || empty($cantidad) || empty($precioventa)) {
            echo MsgAlert("Debe completar todos los campos");
        } else {
            $Rs = mysqli_query($Conex, "Insert into productos (descripcion,idcategoria,preciocompra,Stock,idundmedida,precioventa) 
        values ('$descripcion','$categoria','$preciocompra','$cantidad','$undmedida','$precioventa')");
            $count = mysqli_affected_rows($Conex);

            if ($count > 0) {
                echo  MsgAlert("Registro existoso");
            } else {
                echo MsgAlert("No se pudo registrar");
            }
        }
    }


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
                <li class="nav-item">
                    <a class="nav-link" href="busquedabodega.php">Consulta de ventas</a>
                </li>
                <li class="nav-item active">
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
                    <form action="registrobodega.php" method="POST">
                        <div class="card shadow border-dark">
                            <div class="card-header bg-dark text-white">
                                <span style="font-weight: 700 !important; font-size:18px">Registro de producto.</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="txtdescripcion">Producto:</label>
                                            <input type="text" name="txtdescripcion" id="txtdescripcion" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="ddlcategoria">Categoría:</label>
                                            <select class="form-control" id="ddlcategoria" name="ddlcategoria">
                                                <?php
                                                while ($dataC = mysqli_fetch_assoc($rsCategorias)) {
                                                    echo "<option value='" . $dataC["idcategoria"] . "'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtcantidad">Cantidad:</label>
                                            <input type="number" name="txtcantidad" id="txtcantidad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="ddlundmedida">Medida:</label>
                                            <select class="form-control" id="ddlundmedida" name="ddlundmedida">
                                                <?php
                                                while ($dataC = mysqli_fetch_assoc($rsmedidas)) {
                                                    echo "<option value='" . $dataC["idundmedida"] . "'>" . utf8_encode($dataC["descripcion"]) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtpreciocompra">Prec. Costo:</label>
                                            <input type="number" name="txtpreciocompra" id="txtpreciocompra" class="form-control" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="txtprecioventa">Prec. Venta:</label>
                                            <input type="number" name="txtprecioventa" id="txtprecioventa" class="form-control" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="btn-group">
                                            <input type="submit" value="Guardar" name="btnguardar" class="btn btn-success ">
                                            <input type="button" value="Cancelar" class="btn btn-danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card mt-3 mb-3 shadow border-dark">
                        <div class="card-body">
                            <table id="tabla" class="table table-striped  table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Item</th>
                                        <th class="text-center">Descripción</th>
                                        <th class="text-center">Categoría</th>
                                        <th class="text-center">P. Compra</th>
                                        <th class="text-center">P.Venta</th>
                                        <th class="text-center">Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($datosPro = mysqli_fetch_assoc($rsLstProducto)) {
                                        echo "<tr><td class='text-center'><a href='editarpro.php?id=" . $datosPro['idproducto'] . "'><button class='btn btn-md btn-primary'>Editar</button></a></td><td>" . $datosPro['descripcion'] . "</td><td class='text-center'>" . $datosPro['categor'] . "</td><td class='text-center'>S/ " . $datosPro['preciocompra'] . "</td><td class='text-center'>S/ " . $datosPro['precioventa'] . "</td><td class='text-center'>" . $datosPro['Stock'] . " " . $datosPro['unidad'] . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $(document).ready(function() {
            // $('.selectpicker').selectpicker();
            $('#tabla').DataTable({
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