<?php
include_once('Cnx.php');

$rsCategorias = mysqli_query($Conex, "Select * from categoria;");
$rsProductos = mysqli_query($Conex, "Select idproducto,descripcion from productos;");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- needs for bootstrap-select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- bootstrap-select additional library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/css/bootstrap-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>




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
                    <a class="nav-link" href="index.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="busqueda.php">Consulta de ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro de producto</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section class="mt-4">
        <div class="container-fluid">
            <h5 class="text-center text-primary">Tipo de busqueda</h5>

            <div class="row">
                <div class="col-12 text-center mt-3 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Producto</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Categoría</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Stock</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="ddlproducto" style="color:green;">Ingresa o selecciona valor:</label>
                        <select class="selectpicker form-control" data-live-search="true" id="ddlproducto">
                            <?php
                            while ($dataP = mysqli_fetch_assoc($rsProductos)) {
                                echo "<option value='" . $dataP["idcategoria"] . "'>" . $dataP["descripcion"] . "</option>";
                            }
                            ?>
                        </select>
                        <select class="form-control" id="ddlcategoria" hidden>
                            <?php
                            while ($dataC = mysqli_fetch_assoc($rsCategorias)) {
                                echo "<option value='" . $dataC["idcategoria"] . "'>" . $dataC["descripcion"] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="number" name="" id="txtcantidad" class="form-control" hidden>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <table id="example" class="table table-striped  table-bordered dt-responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio Venta</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>LECHE IDEAL CREMOSITA</td>
                                <td>3.30</td>
                                <td>2</td>
                                <td>21/03/2000</td>
                                <td>4</td>

                            </tr>
                            <tr>
                                <td>AZUCAR</td>
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
            $('#example').DataTable();
            var control1 = document.getElementById('inlineRadio1');
            control1.checked = true;
            validarestado(control1);
        });


        function validarestado(control) {
            switch (control.value) {
                case "option1":
                    $('.bootstrap-select').attr('hidden', false);
                    $('#ddlcategoria').attr('hidden', true);
                    $('#txtcantidad').attr('hidden', true);
                    break;
                case "option2":
                    $('.bootstrap-select').attr('hidden', true);
                    $('#ddlcategoria').attr('hidden', false);
                    $('#txtcantidad').attr('hidden', true);
                    break;
                default:
                    $('.bootstrap-select').attr('hidden', true);
                    $('#ddlcategoria').attr('hidden', true);
                    $('#txtcantidad').attr('hidden', false);
                    break;
            }
        }
    </script>
</body>

</html>