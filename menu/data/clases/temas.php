<?php
include_once "menu/data/clases/entity.php";
include_once "funciones/global/conexion.php";

class Temas extends Entity{
    
    // realiza una consulta a la bd asignando una nueva fila a temas

    public function set_new_tema($nombre,$duracion,$popularidad,$explicidad,$idArtista){   

        $object = new Conexiones();
        $conexion = $object->Conectar();
        $consulta = "INSERT INTO temas(nombre,duracion,popularidad,explicidad,idArtista) 
                    VALUES ('$nombre','$duracion','$popularidad','$explicidad','$idArtista')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if(!$resultado){
            echo "<script>alert('Algo hice mal otra vez')</script>";
        } else {
            echo "<script>alert('Al fin')</script>";
        }
        
    }

    // elimina un tema de la bd via ID

    public function del_tema($id){   

        $object = new Conexiones();
        $conexion = $object->Conectar();
        $consulta = "DELETE FROM temas WHERE ID = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if(!$resultado){
            echo "<script>alert('Algo hice mal otra vez')</script>";
        } else {
            echo "<script>alert('Al fin')</script>";
        }
        
    }

    // devuelve la lista entera de las filas de la tabla temas
    
    public function __get($name)
    {
        switch ($name){
            case ("mostrarLista"): 
                $objeto = new Conexiones();
                $conexion = $objeto->Conectar();
                $consulta = "SELECT * FROM temas";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_ASSOC);                
                break;
        }
    }
    
}