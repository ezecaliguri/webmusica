<?php
include_once "menu/data/clases/entity.php";
include_once "funciones/global/conexion.php";

class Artista extends Entity{
    
    // agrega un nuevo artista, creando una consulta a la bd
    public function set_new_artista($nombre,$email,$imagen,$url){   

        $object = new Conexiones();
        $conexion = $object->Conectar();
        $consulta = "INSERT INTO artistas(nombre,email,imagen,web) 
                    VALUES ('$nombre','$email','$imagen','$url')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if(!$resultado){
            echo "<script>alert('Algo hice mal otra vez')</script>";
        } else {
            echo "<script>alert('Al fin')</script>";
        }
        
    }

    // elimina un artista realizando una consulta con la condicion del id
    public function del_artista($id){   

        $object = new Conexiones();
        $conexion = $object->Conectar();
        $consulta = "DELETE FROM artistas WHERE ID = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if(!$resultado){
            echo "<script>alert('Algo hice mal otra vez')</script>";
        } else {
            echo "<script>alert('Al fin')</script>";
        }
        
    }

    // consulta a la bd para editar el artista

    public function set_edit_artista($id,$nombre,$email,$imagen,$url){   

        $object = new Conexiones();
        $conexion = $object->Conectar();
        $consulta = "UPDATE artistas SET nombre='$nombre',email='$email',
                    imagen='$imagen',web='$url' WHERE ID = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if(!$resultado){
            echo "<script>alert('Algo hice mal otra vez')</script>";
        } else {
            echo "<script>alert('Al fin')</script>";
        }
        
    }

    // funcion que devuelve la lista completa de la bd de la tabla artistas
    
    public function __get($name)
    {
        switch ($name){
            case ("mostrarLista"): 
                $objeto = new Conexiones();
                $conexion = $objeto->Conectar();
                $consulta = "SELECT * FROM artistas";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_ASSOC);                
                break;
        }
    }
    
}