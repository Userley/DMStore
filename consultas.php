<?php
include_once('Cnx.php');

$tipo = $_GET['tipo'];
$data = array();



//CONSULTA DE PRODUCTO

if ($tipo == "CP") {
    $codPro = $_GET['codpro'];
    $rs = mysqli_query($Conex, "select p.preciocompra, p.precioventa, p.stock, m.descripcion as unidad from productos p inner join unidadmedida m on m.idundmedida=p.idundmedida where p.idproducto='$codPro';");

    while ($datos = mysqli_fetch_assoc($rs)) {
        $data["preciocompra"] = $datos["preciocompra"];
        $data["precioventa"] = $datos["precioventa"];
        $data["stock"] = $datos["stock"];
        $data["unidad"] = $datos["unidad"];
    }
}


//REGISTRO DE PRODUCTO

if ($tipo == "RP") {
    $codPro = $_GET['codpro'];
    $precioc = $_GET['precioc'];
    $preciov = $_GET['preciov'];
    $cantidad = $_GET['cantidad'];
    $subtotal = $_GET['subtotal'];
    $total = $_GET['total'];
    $fecha = $_GET['fecha'];
    $rsventa = mysqli_query($Conex, "INSERT INTO ventas (fecha,totalventa) VALUES('$fecha','$total');");
    $id = $Conex->insert_id;
    $filas = mysqli_affected_rows($Conex);
    if ($filas) {
        $datacodpro = explode("-", rtrim($codPro, "-"));
        $dataprecioc = explode("-", rtrim($precioc, "-"));
        $datapreciov = explode("-", rtrim($preciov, "-"));
        $datacantidad = explode("-", rtrim($cantidad, "-"));
        $datasubtotal = explode("-", rtrim($subtotal, "-"));

        for ($i = 0; $i < count($datacodpro); $i++) {
            $rsdetalleventas = mysqli_query($Conex, "INSERT INTO detalleventas (idventas,idproducto,preciocompra,precioventa,cantidad,fechaventa,idservicio) VALUES ('$id','$datacodpro[$i]','$dataprecioc[$i]','$datapreciov[$i]','$datacantidad[$i]','$fecha','1');");
            $rsactualizar = mysqli_query($Conex, "UPDATE productos set Stock= Stock - " . $datacantidad[$i] . " WHERE idproducto='" . $datacodpro[$i] . "';");
        }
        $filasdetalle = mysqli_affected_rows($Conex);

        if ($filasdetalle) {
            $data["estado"] = "OK";
        } else {
            $data["estado"] = "False";
        }
    }
}


//REGISTRO DE VENTAS

if ($tipo == "RV") {
    echo "";
}


//CONSULTAR VENTAS

if ($tipo == "CV") {
    $fecha1 = $_GET['fecha1'];
    $fecha2 = $_GET['fecha2'];

    $codigov = "";
    $fechav = "";
    $horav = "";
    $totalv = "";


    $rsdetventa = mysqli_query($Conex, "SELECT v.idventa,DATE_FORMAT(v.fecha, '%d-%m-%Y') AS fecha,DATE_FORMAT(v.fecha, '%H:%i:%s') AS hora ,totalventa 
FROM ventas v WHERE DATE_FORMAT(fecha, '%Y-%m-%d')  BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha DESC ;");

    $lstventasdetalle = array();

    while ($datos = mysqli_fetch_assoc($rsdetventa)) {
        $codigov = $datos["idventa"];
        $fechav = $datos["fecha"];
        $horav = $datos["hora"];
        $totalv = $datos["totalventa"];

        $data[] = array('codigo' => $codigov, 'fecha' => $fechav, 'hora' => $horav, 'total' => $totalv);
    }
}
$cnClose = mysqli_close($Conex);


echo json_encode($data);
