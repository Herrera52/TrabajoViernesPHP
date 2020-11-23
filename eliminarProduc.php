<?php

    include("BaseDatos.php");

    $id=$_GET["id"];

    $transaccion = new BaseDatos();

    $agregarDatosSQL = "DELETE FROM venta WHERE idProducto='$id'";

    $transaccion->eliminarProductos($agregarDatosSQL);

    header("location:almacen.php");






?>