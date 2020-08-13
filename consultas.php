<?php
include_once('Cnx.php');

$tipo = $_GET['tipo'];
$codPro = $_GET['codpro'];

$data = array();


if ($tipo == "CP") {

    $rs = mysqli_query($Conex, "select p.preciocompra, p.precioventa, concat(p.stock, ' ', m.descripcion) as stock from productos p inner join unidadmedida m on m.idundmedida=p.idundmedida where p.idproducto='$codPro';");

    while ($datos = mysqli_fetch_assoc($rs)) {
        $data["preciocompra"] = $datos["preciocompra"];
        $data["precioventa"] = $datos["precioventa"];
        $data["stock"] = $datos["stock"];
    }
}


echo json_encode($data);
