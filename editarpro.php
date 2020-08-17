<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once("header.php");
    include_once("utiles.php");
    include_once('Cnx.php');
    $rsCategorias = mysqli_query($Conex, "Select * from categoria;");
    $rsmedidas = mysqli_query($Conex, "Select * from unidadmedida;");

    $id = $_GET["id"];

    $lstpro = mysqli_query($Conex, "select * from productos where idproducto='" . $id . "'");
    $dtopro = mysqli_fetch_assoc($lstpro);

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
                                            <a href="registrobodega.php"> <input type="button" value="Volver" class="btn btn-info"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>
    <script>
        $(document).ready(function() {
            // $('.selectpicker').selectpicker();


        });
    </script>
</body>

</html>