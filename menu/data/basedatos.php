<?php

class BaseDatos extends Conexiones{    

    public function __get($name)
    {
        switch ($name){

            case ("artistas"):
                $consulta = "SELECT * FROM artistas";
                $resultado = parent::Conectar()->prepare($consulta);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_ASSOC);  
            break;
            case ("temas"):
                $consulta = "SELECT * FROM temas";
                $resultado = parent::Conectar()->prepare($consulta);
                $resultado->execute();
                return $resultado->fetchAll(PDO::FETCH_ASSOC);  
            break;
                
        }
    }

    public function __set($name, $arr = "")
    {
        switch($name){
            case ("agregarArtista"):
                $this->insertar("artista",$arr);
                break;
            case ("agregarTema"):
                $this->insertar("tema",$arr);
                break;
            case ("eliminarArtista"):
                $this->eliminar("artista",$arr);
                break;
            case ("eliminarTema"):
                $this->eliminar("tema",$arr);
                break;
            case ("editarArtista"):
                $this->editar("artista",$arr);
                break;
            case ("editarTema"):
                $this->editar("tema",$arr);
                break;
        }
    }

    protected  function insertar($value,$dato){

        if($value == "artista"){
            $consulta = "INSERT INTO artistas(nombre,email,imagen,web) 
                        VALUES ('$dato[0]','$dato[1]','$dato[2]','$dato[3]')";
            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();

        } else if($value == "tema"){

            $consulta = "INSERT INTO temas(nombre,duracion,popularidad,explicidad,idArtista) 
                        VALUES ('$dato[0]','$dato[1]','$dato[2]','$dato[3]','$dato[4]')";            
            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();
        }

        return self::chequeo($resultado);
    }

    protected function editar($tabla,$dato){
        if($tabla == "artista"){
            $consulta = "UPDATE artistas SET nombre='$dato[1]',email='$dato[2]',
                        imagen='$dato[3]',web='$dato[4]'
                        WHERE ID = '$dato[0]'";

            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();
        } else if ($tabla == "tema"){
            $consulta = "UPDATE temas SET nombre='$dato[1]',duracion='$dato[2]',
                        popularidad='$dato[3]',explicidad='$dato[4]',idArtista='$dato[5]' 
                        WHERE ID = '$dato[0]'";
                        
            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();
        }
    }

    protected function eliminar($tabla,$id){
        if($tabla == "tema"){
            $consulta = "DELETE FROM temas WHERE ID = '$id'";
            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();
        } else if ($tabla == "artista"){
            $consulta = "DELETE FROM artistas WHERE ID = '$id'";
            $resultado = parent::Conectar()->prepare($consulta);
            $resultado->execute();
        }
    }

    public static function chequeo($var){ 
        if(!$var){
            echo "<script>alert('Se produjo un error en la base de datos')</script>";
        } 
    }

}