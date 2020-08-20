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
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                                    <div class="form-group">
                                        <label for="txtproducto">Producto:</label>
                                        <select class="selectpicker form-control" data-live-search="true" id="txtproducto">
                                            <?php
                                            while ($dataP = mysqli_fetch_assoc($rsProductos)) {
                                                echo "<option value='" . $dataP["idproducto"] . "'>" . $dataP["descripcion"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">
                                    <div class="form-group">
                                        <label for="txtstock">Stock:</label>
                                        <input type="text" name="" id="txtstock" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">
                                    <div class="form-group">
                                        <label for="txtunidad">Und. Med:</label>
                                        <input type="text" name="" id="txtunidad" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-1">
                                    <div class="form-group">
                                        <label for="txtprecio">P. Comp.:</label>
                                        <input type="text" name="" id="txtprecioC" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-1">
                                    <div class="form-group">
                                        <label for="txtprecio">P. Venta:</label>
                                        <input type="number" name="" id="txtprecioV" class="form-control" step="0.15">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-1">
                                    <div class="form-group">
                                        <label for="txtcantidad">Cantidad:</label>
                                        <input type="number" name="" id="txtcantidad" step="0.10" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-inline text-center">
                                        <input type="button" value=" ✚ Agregar producto" id="agregar" class="btn btn-success mr-3">
                                        <!-- <input type="button" value="Limpiar" class="btn btn-danger mr-3"> -->
                                        <input type="button" value="✓ Guardar Compra" id="guardar" class="btn btn-danger">
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mt-3 mb-3 shadow border-dark">
                <div class="card-body">
                    <div class="group-control-inline">
                        <label for="TotalVentas">Total Compra:</label>
                        <input type="text" name="" id="TotalVentas" class="form-control" style="width: 30%;float:right;" value="" readonly>
                    </div>
                    <br>
                    <table class="table table-striped  table-bordered dt-responsive nowrap" style="width: 100%; font-size: 14px !important;" id="tabla">
                        <thead>
                            <tr>
                                <th class="text-center">Item</th>
                                <th class="text-center">Nombre</th>
                                <th style="display: none;">Compra</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
            // $('#tabla').DataTable({
            //     "language": {
            //         "decimal": "",
            //         "emptyTable": "No hay datos válidos en la tabla",
            //         "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            //         "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            //         "infoFiltered": "(filtrado de _MAX_ registros)",
            //         "infoPostFix": "",
            //         "thousands": ",",
            //         "lengthMenu": "Mostrar _MENU_ registros",
            //         "loadingRecords": "Cargando...",
            //         "processing": "Procesando...",
            //         "search": "Buscar:",
            //         "zeroRecords": "No existen registros.",
            //         "paginate": {
            //             "first": "Primero",
            //             "last": "Anterior",
            //             "next": "Siguiente",
            //             "previous": "Último"
            //         }
            //     }
            // });


            $("#guardar").attr('Disabled', true);
            buscardatosproducto();


        });

        function SumarSubtotales() {

            var VentasTotal = 0;
            $("#tabla").find("td[id='subtotal']").each(function() {
                var subt = $(this).text();
                if (subt != "") {
                    VentasTotal = parseFloat(VentasTotal) + parseFloat(subt);
                    $("#guardar").attr('Disabled', false);
                }
            });
            if (parseFloat(VentasTotal) <= 0) {
                $("#guardar").attr('Disabled', true);
            }

            $("#TotalVentas").val("S/. " + VentasTotal.toFixed(2));
        }

        function removeRegistro(control) {
            var idcontrol = $("#" + control.id).val();
            $("#tabla").find("[id='C" + idcontrol + "']").remove();
            $("#txtcantidad").val("");
            $("#txtcantidad").focus();
            SumarSubtotales();

        }

        $("#txtproducto").change(function(e) {
            buscardatosproducto();
        });


        $('#agregar').click(function() {

            var codigo = $("#txtproducto").val();
            var nombre = $("#txtproducto option:selected").text();
            var pcompra = $("#txtprecioC").val();
            var pventa = $("#txtprecioV").val();
            var stock = $("#txtstock").val();
            var cantidad = $("#txtcantidad").val();
            var Total = cantidad * $('#txtprecioV').val();

            var fila = $("#tabla").find("[id='C" + codigo + "']").text();
            if (fila == "") {
                if (cantidad != "") {
                    if (parseFloat(cantidad) <= 0) {
                        alert("La cantidad no puede ser 0");
                        $("#txtcantidad").focus();
                    } else {
                        if (parseFloat(cantidad) > parseFloat(stock)) {
                            alert("La cantidad no puede ser mayor al Stock actual");
                            $("#txtcantidad").focus();
                        } else {
                            $('#tabla').append('<tr id="C' + codigo + '"><td class="text-center" id="cod"><button id="P' + codigo + '" value="' + codigo + '" onclick="removeRegistro(this);" style="background-color:red !important; border:0 px;" class="btn btn-sm text-white btnow">X</button></td><td class="text-center" >' + nombre + '</td><td id="pcompra" style="display:none" class="text-center" >' + pcompra + '</td><td id="pventa" class="text-center" >' + pventa + '</td><td id="cant" class="text-center" >' + cantidad + '</td><td id="subtotal" class="text-center" >' + Total.toFixed(2) + '</td></tr>');
                            $("#txtcantidad").val("");
                            SumarSubtotales();
                        }
                    }
                } else {
                    alert("Falta detallar la cantidad");
                    $("#txtcantidad").focus();
                }
            } else {
                alert("El registro ya existe");
            }

        });

        $('#guardar').click(function() {
            var totalcodigospro = "";
            var totalcompvpro = "";
            var totalprevpro = "";
            var totalcantpro = "";
            var totalsubtotalpro = "";


            $("#tabla").find("[class='btn btn-sm text-white btnow']").each(function() {
                var codrowpro = $(this).val();
                totalcodigospro += codrowpro + "-";
            });
            $("#tabla").find("[id='pcompra']").each(function() {
                var cantpcomprarowpro = $(this).text();
                totalcompvpro += cantpcomprarowpro + "-";
            });


            $("#tabla").find("[id='pventa']").each(function() {
                var cantpventarowpro = $(this).text();
                totalprevpro += cantpventarowpro + "-";
            });

            $("#tabla").find("[id='cant']").each(function() {
                var cantrowpro = $(this).text();
                totalcantpro += cantrowpro + "-";
            });


            $("#tabla").find("[id='subtotal']").each(function() {
                var subtotalrowpro = $(this).text();
                totalsubtotalpro += subtotalrowpro + "-";
            });

            var TotalVentas = $("#TotalVentas").val().replace('S/. ', '');
            RegistrarVentas(totalcodigospro, totalcompvpro, totalprevpro, totalcantpro, totalsubtotalpro, TotalVentas);

        });

        function RegistrarVentas(codproducto, preciocompra, precioventa, cantidad, subtotal, total) {

            var f = new Date();
            var fecha = f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate() + " " + (f.getHours()) + ":" + (f.getMinutes()) + ":" + (f.getSeconds());;

            $.ajax({
                // la URL para la petición
                url: 'consultas.php',

                // especifica si será una petición POST o GET
                type: 'GET',

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: {
                    tipo: 'RP',
                    codpro: codproducto,
                    precioc: preciocompra,
                    preciov: precioventa,
                    cantidad: cantidad,
                    subtotal: subtotal,
                    total: total,
                    fecha: fecha
                },

                // el tipo de información que se espera de respuesta
                dataType: 'text',

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
            // }

        }

        function buscardatosproducto() {
            var codpro = $("#txtproducto").val();
            $.ajax({
                // la URL para la petición
                url: 'consultas.php',

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: {
                    tipo: 'CP',
                    codpro: codpro
                },
                // especifica si será una petición POST o GET
                type: 'GET',

                // el tipo de información que se espera de respuesta
                dataType: 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success: function(json) {
                    $("#txtprecioC").val(json.preciocompra);
                    $("#txtprecioV").val(json.precioventa);
                    $("#txtstock").val(json.stock);
                    $("#txtunidad").val(json.unidad);
                    $("#txtcantidad").val("");
                    $("#txtcantidad").focus();
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

        }
    </script>
</body>

</html>