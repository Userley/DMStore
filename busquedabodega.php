<?php
include_once('Cnx.php');

$rsCategorias = mysqli_query($Conex, "Select * from categoria;");
$rsProductos = mysqli_query($Conex, "Select idproducto,descripcion from productos;");
$filas = 0;
if (isset($_POST["buscav"])) {
    $fecha1 = $_POST["txtfecha1"];
    $fecha2 = $_POST["txtfecha2"];
    $rsventas = mysqli_query($Conex, "SELECT v.idventa,DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha,DATE_FORMAT(v.fecha, '%H:%i:%s') AS hora ,totalventa 
    FROM ventas v WHERE DATE_FORMAT(fecha, '%Y-%m-%d')  BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha DESC ;");
    $filas = mysqli_num_rows($rsventas);
}

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
                    <!-- <label for="" class="text-danger">Opciones de búsqueda:</label> -->
                    <div class="row">
                        <!-- <div class="col-sm-12 col-md-12 col-lg-12 mt-1 mb-1">
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
                        </div> -->
                        <form action="" method="POST">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="ddlproducto">Seleccione rango de fechas:</label>
                                    <!-- <select class="selectpicker form-control" data-live-search="true" id="ddlproducto">
                                    <?php
                                    // while ($dataP = mysqli_fetch_assoc($rsProductos)) {
                                    //     echo "<option value='" . $dataP["idcategoria"] . "'>" . $dataP["descripcion"] . "</option>";
                                    // }
                                    ?>
                                </select> -->
                                    <!-- <select class="form-control" id="ddlcategoria" hidden>
                                    <?php
                                    // while ($dataC = mysqli_fetch_assoc($rsCategorias)) {
                                    //     echo "<option value='" . $dataC["idcategoria"] . "'>" . $dataC["descripcion"] . "</option>";
                                    // }
                                    ?>
                                </select> -->
                                    <div class="row" >
                                        <div class="col-sm-12 col-lg-6 col-md-6 ">
                                            <div class="form-group ">
                                                <label for="txtfecha1" style="color: red;">Inicio:</label>
                                                <input type="date" class="form-control form-control-sm ml-2" name="txtfecha1" id="txtfecha1">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-6 ">
                                            <div class="form-group ">
                                                <label for="txtfecha2" style="color: red;">Fin:</label>
                                                <input type="date" class="form-control form-control-sm ml-2" name="txtfecha2" id="txtfecha2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="btn-group">
                                    <input type="submit" value="Buscar" id="buscarv" name="buscav" class="btn btn-success">
                                    <input type="button" value="Cancelar" class="btn btn-danger">
                                </div>
                                <hr>
                            </div>
                        </form>
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="group-control-inline mb-4">
                                <label for="TotalVentas">Total Venta:</label>
                                <input type="text" name="" id="TotalVentas" class="form-control" style="width: 30%;float:right;" value="" readonly>
                            </div>

                            <table id="example" class="table table-striped  table-bordered dt-responsive" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class='text-center' style="width: 25px;">Item</th>
                                        <th class='text-center'>Fecha</th>
                                        <th class='text-center'>Hora</th>
                                        <th class='text-center'>Total</th>
                                        <th class='text-center'>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($filas > 0) {
                                        $c = 0;
                                        while ($venta = mysqli_fetch_assoc($rsventas)) {
                                            $c = $c + 1;
                                            echo "<tr>
                                                <td class='text-center'>" . $c . "</td>
                                                <td class='text-center'>" . $venta["fecha"] . "</td>
                                                <td class='text-center'>" . $venta["hora"] . "</td>
                                                <td class='text-center'>S/" . $venta["totalventa"] . "</td>
                                                <td class='text-center'><a href='detalleventa.php?id=" . $venta["idventa"] . "'><button class='btn btn-primary'>Detalle</button></a></td>
                                                </tr>";
                                        }
                                    }


                                    ?>
                                </tbody>
                            </table>

                            <!-- 
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
                            </table> -->
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
            // var control1 = document.getElementById('inlineRadio1');
            // control1.checked = true;
            // validarestado(control1);
            $('#txtfecha1').val(today);
            $('#txtfecha2').val(today);

            $('#example1').DataTable({
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


        // $('#buscarv').click(function() {
        //     var fechaini = $('#txtfecha1').val();
        //     var fechafin = $('#txtfecha2').val();
        //     console.log(fechaini + ' ' + fechafin);
        //     GetDataVentas(fechaini, fechafin);

        // });

        function GetDataVentas(fecha1, fecha2) {

            $.ajax({
                // la URL para la petición
                url: 'consultas.php',

                // especifica si será una petición POST o GET
                type: 'GET',

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: {
                    tipo: 'CV',
                    fecha1: fecha1,
                    fecha2: fecha2
                },

                // el tipo de información que se espera de respuesta
                dataType: 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success: function(json) {

                    var count = Object.keys(json).length
                    console.log(json);
                    if (count > 0) {
                        $('.odd').attr('style', 'display:none');
                        $('#example').find("[id='datatable']").remove();

                        for (let index = 0; index < count; index++) {
                            $('#example').append('<tr id="datatable"><td class="text-center">' + (index + 1) + '</td><td class="text-center" >' + json[index].fecha + '</td><td class="text-center" >' + json[index].hora + '</td><td class="text-center" >' + json[index].total + '</td><td class="text-center" ><a href="detalleventa.php?id=' + json[index].codigo + '"><button class="btn btn-primary">Detalle</button></a></td></tr>');
                        }
                    } else {
                        $('#example').find("[id='datatable']").remove();
                        $('.odd').attr('style', '')
                    }

                    // var rspta = JSON.parse(json);


                    // if(rspta.estado == "OK") {
                    //     alert("¡Registro exitoso!");
                    //     location.reload();
                    // } else {
                    //     alert("Error de registro.");
                    // }
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


        // function validarestado(control) {
        //     switch (control.value) {
        //         case "option1":
        //             $('.bootstrap-select').attr('hidden', false);
        //             $('#ddlcategoria').attr('hidden', true);
        //             $('#txtfecha').attr('hidden', true);
        //             break;
        //         case "option2":
        //             $('.bootstrap-select').attr('hidden', true);
        //             $('#ddlcategoria').attr('hidden', false);
        //             $('#txtfecha').attr('hidden', true);
        //             break;
        //         default:
        //             $('.bootstrap-select').attr('hidden', true);
        //             $('#ddlcategoria').attr('hidden', true);
        //             $('#txtfecha').attr('hidden', false);
        //             break;
        //     }
        // }
    </script>
</body>

</html>