<?php

class BaseDatos{

    public $usuarioBD = "root";
    public $passwordBD = "";
    public $nombreServidor = "local";

    public function __construct()
    {
        
    }

    public function conectarBD(){

        try{

            $infoBD = "mysql:host=localhost;dbname=ventas";
            $conexionBD=new PDO($infoBD,$this->usuarioBD,$this->passwordBD);
            return($conexionBD);

        }
        catch(PDOException $error){

            echo($error->getMessage());
        }
    }

    public function aggDatos($agregarDatosSQL){

        $conexionBD=$this-> conectarBD();

        $insertarDatos = $conexionBD->prepare($agregarDatosSQL);

        $resultado = $insertarDatos->execute();

        if($resultado){
            echo("Registro agregado con exito");
        }else{
            echo("Error agregando el registro");
        }
    }

    public function consultarProductos($agregarDatosSQL){

        $conexionBD = $this->conectarBD();

        $consultarProduc = $conexionBD->prepare($agregarDatosSQL);

        $consultarProduc->setFetchMode(PDO::FETCH_ASSOC);

        $consultarProduc->execute();

        return($consultarProduc->fetchAll());
    }

    public function eliminarProductos($agregarDatosSQL){

        $conexionBD=$this->conectarBD();

        $eliminarProductosAlmacen = $conexionBD->prepare($agregarDatosSQL); 

        $resultado = $eliminarProductosAlmacen->execute();
        
        if($resultado){
            echo("Registro eliminado con exito");
        }else{
            echo("Error al eliminar el registro");
        }


    }

    public function editarProductos($agregarDatosSQL){

        $conexionBD=$this->conectarBD();

        $editarProductosAlmacen = $conexionBD->prepare($agregarDatosSQL); 

        $resultado = $editarProductosAlmacen->execute();
        
        if($resultado){
            echo("Registro editado con exito");
        }else{
            echo("Error al editar el registro");
        }
    }



}







?>