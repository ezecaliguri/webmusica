<?php

class Redirecciones {
    public static function header($var){
        switch($var){

            case ("index"):
                header("LOCATION: index.php");
                break;

            case ("temas"):
            header("LOCATION: index.php?menu=temas");
                break;
            
            case ("playlist"):
            header("LOCATION: index.php?menu=playlist");
                break;
            case ("artistas"):
                header("LOCATION: index.php?menu=artistas");
                break;
        }
    }
}