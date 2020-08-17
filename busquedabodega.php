<?php
include_once('Cnx.php');

$rsCategorias = mysqli_query($Conex, "Select * from categoria;");
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
            <a class="navbar-brand" href="#"><strong>Diana Store</strong></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="bodega.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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
        <div class="container-fluid">
            <div class="card shadow mb-2 border-dark">
                <div class="card-header bg-dark text-white">
                    <span style="font-weight: 700 !important; font-size:18px">Consulta de ventas.</span>
                </div>
                <div class="card-body">
                    <!-- <h5 class="text-primary">Tipo de busqueda</h5> -->
                    <label for="" class="text-danger">Opciones de búsqueda:</label>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-1 mb-1">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio1" value="option1">
                                <label class="form-check-label text-dark" for="inlineRadio1">Producto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio2" value="option2">
                                <label class="form-check-label text-dark" for="inlineRadio2">Categoría</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" onchange="validarestado(this);" id="inlineRadio3" value="option3">
                                <label class="form-check-label text-dark" for="inlineRadio3">Fecha</label>
                            </div>
                            <hr>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="ddlproducto">Ingresa o selecciona valor:</label>
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
                                <div class="row" id="txtfecha" hidden>
                                    <div class="col-sm-12 col-lg-6 col-md-6 ">
                                        <div class="form-group form-inline">
                                            <label for="txtfecha1" style="color: red;">Inicio:</label>
                                            <input type="date" class="form-control form-control-sm ml-2" name="" id="txtfecha1">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 col-md-6 ">
                                        <div class="form-group form-inline">
                                            <label for="txtfecha2" style="color: red;">Fin:</label>
                                            <input type="date" class="form-control form-control-sm ml-2" name="" id="txtfecha2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="btn-group">
                                <input type="button" value="Buscar" class="btn btn-success ">
                                <input type="button" value="Cancelar" class="btn btn-danger">
                            </div>
                            <hr>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
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
            </div>
        </div>
    </section>
    <script>
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + (month) + "-" + (day);

        $(document).ready(function() {
            //$('#example').DataTable();
            var control1 = document.getElementById('inlineRadio1');
            control1.checked = true;
            validarestado(control1);
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



        $('#txtfecha2').change(function() {
            var fecha1 = $('#txtfecha1').val();
            var fecha2 = $('#txtfecha2').val();
            if (fecha2 < fecha1) {
                alert('La fecha Fin no puede ser menor a la fecha Inicio');
                $('#txtfecha2').val(today);
            }
        });

        $('#txtfecha1').change(function() {
            var fecha1 = $('#txtfecha1').val();
            var fecha2 = $('#txtfecha2').val();
            if (fecha1 > fecha2) {
                alert('La fecha Inicio no puede ser mayor a la fecha Fin');
                $('#txtfecha1').val(today);
            }
        });

        function validarestado(control) {
            switch (control.value) {
                case "option1":
                    $('.bootstrap-select').attr('hidden', false);
                    $('#ddlcategoria').attr('hidden', true);
                    $('#txtfecha').attr('hidden', true);
                    break;
                case "option2":
                    $('.bootstrap-select').attr('hidden', true);
                    $('#ddlcategoria').attr('hidden', false);
                    $('#txtfecha').attr('hidden', true);
                    break;
                default:
                    $('.bootstrap-select').attr('hidden', true);
                    $('#ddlcategoria').attr('hidden', true);
                    $('#txtfecha').attr('hidden', false);
                    break;
            }
        }
    </script>
</body>

</html>