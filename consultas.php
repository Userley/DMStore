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
    $filas = mysqli_affected_rows($rsventa);
    if ($filas > 0) {
        $datacodpro = explode("-", rtrim($codPro, "-"));
        $dataprecioc = explode("-", rtrim($precioc, "-"));
        $datapreciov = explode("-", rtrim($preciov, "-"));
        $datacantidad = explode("-", rtrim($cantidad, "-"));
        $datasubtotal = explode("-", rtrim($codPsubtotalro, "-"));

        for ($i = 0; $i < count($datacodpro); $i++) {
            $rsdetalleventas = mysqli_query($Conex, "INSERT INTO detalleventas (idventas,idproducto,preciocompra,precioventa,cantidad,fechaventa,idservicio) VALUES ('$id','$datacodpro[$i]','$dataprecioc[$i]','$datapreciov[$i]','$datacantidad[$i]','$fecha','1');");
        }
        $filasdetalle = mysqli_affected_rows($rsdetalleventas);
        if ($filasdetalle > 0) {
            $data["estado"] = "True";
        } else {
            $data["estado"] = "False";
        }
    }
}


//REGISTRO DE VENTAS

if ($tipo == "RV") {
    # code...
}

echo json_encode($data);
