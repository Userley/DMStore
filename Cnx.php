<?php
$host = "localhost";
$bd = "bd_dmstore";
$user = "root";
$psw = "";

$Conex = mysqli_connect($host, $user, $psw, $bd) or die("Error de conexión");

if (!$Conex) {
    echo "<script>alert('Problemas de Conexión');</script>";
}
