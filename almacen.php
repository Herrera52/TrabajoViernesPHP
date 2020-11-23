<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALMACEN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<header>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="pagPrincipal.html">INICIO</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="FormProduc.php">Registro <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="almacen.php">Almacen</a>
      </li>
     
    </ul>
    
  </div>
</nav>
    
        <div class="title" align="center"><br>
            <h1>PRODUCTOS EN EL ALMACEN</h1>
        </div>

    







<?php

    include("BaseDatos.php");

    $transaccion = new BaseDatos();

    $listAlmacen = "SELECT * FROM `venta` WHERE 1";

    $productos=$transaccion->consultarProductos($listAlmacen);

   


?>
<br>
<div class="container">    
    <div class="row row-cols-1 row-cols-md-3">

    <?php foreach($productos as $producto):?>   
        <div class="col mb-4">
        <div class="card" style="width: 23rem;">
            <img src="<?php echo($producto["Foto"]) ?>" class="card-img-top" alt="imagen">
            <div class="card-body">
                <h3 class="font-weight-bold text-center" ><?php echo($producto["Nombre"])?></h3>
                <p class="card-text"><?php echo($producto["Descripcion"])?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h4 class="font-weight-bold"><?php echo($producto["Marca"])?></h4></li>
                <li class="list-group-item"><h5 class="text-info font-weight-bold text-center"><?php echo($producto["Precio"])?></h5></li>
            </ul>
            <div class="card-body">
                <a href="eliminarProduc.php?id=<?php echo($producto["idProducto"])?>" class="btn btn-danger">Eliminar</a>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo($producto["idProducto"])?>">
                    Editar
                </button>
            </div>
        </div>
    </div>
    <?php endforeach?>

    
<?php foreach($productos as $producto):?> 
    </div>
    <div class="modal fade" id="editar<?php echo($producto["idProducto"])?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDICION DE PRODUCTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="editarProduc.php?id=<?php echo($producto["idProducto"])?>" method="POST">
                     <div class="form-group">
                        <label >Nombre:</label>
                            <input type="text" class="form-control" name="nombreEditar" value="<?php echo($producto["Nombre"])?>">
                    </div>             
                    <div class="form-group">
                        <label >Precio:</label>
                        <input type="text" class="form-control" name="precioEditar" value="<?php echo($producto["Precio"])?>">
                    </div>                               
                    <div class="form-group">
                        <label >Marca:</label>
                        <input type="text" class="form-control" name="marcaEditar" value="<?php echo($producto["Marca"])?>">
                    </div>
                    <button type="submit" class="btn btn-info" name="botonEditar">Editar</button>
                </form>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
            </div>
        </div>
        </div>
        <?php endforeach?>
</div>


   










    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>     
</body>
</header>
</html>