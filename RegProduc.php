<?php

include ("BaseDatos.php");

if (isset($_POST["registrar"])){

    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $foto = $_POST ["foto"];

    $transaccion = new BaseDatos();

    $agregarDatosSQL="INSERT INTO venta(nombre, marca, precio, descripcion, foto) VALUES ('$nombre','$marca','$precio','$descripcion','$foto')";

    $transaccion->aggDatos($agregarDatosSQL);

    header("location:FormProduc.php");
    
}





?>