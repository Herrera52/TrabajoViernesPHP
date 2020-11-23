<?php

include("BaseDatos.php");

$id = $_GET["id"];


if (isset($_POST["botonEditar"])){

    $nombre =$_POST["nombreEditar"];
    $precio =$_POST["precioEditar"];
    $marca=$_POST["marcaEditar"];
    
    $transaccion = new BaseDatos();
    
    $agregarDatosSQL = "UPDATE venta SET Nombre='$nombre', Precio='$precio', Marca='$marca' WHERE idProducto='$id'";
    
    $transaccion->editarProductos($agregarDatosSQL);
    
    header("location:almacen.php");
    
    }











?>