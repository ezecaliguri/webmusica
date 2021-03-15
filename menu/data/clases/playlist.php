<?php 
include_once "menu/data/clases/entity.php";
include_once "funciones/global/conexion.php";

class Playlist extends Entity{

    // elimina un tema de la session

    public function eliminarTemaPlaylist($id){
        foreach($_SESSION["playlist"] as $key => $temas){
            if($temas["id"] == $id){
                unset($_SESSION["playlist"][$key]);
                
                break;
            }
        }
    }

    // asigna un nuevo tema a la playlist
    public function set_playlist ($id,$nombre,$duracion,$popularidad,$explicidad,$artista){

        if(!$_SESSION["playlist"]){
            $nuevoTema = [
                "id" => $id,
                "nombre" => $nombre,
                "duracion" => $duracion,
                "popularidad" => $popularidad,
                "explicidad" => $explicidad,
                "idArtista" => $artista,
            ];
            $_SESSION["playlist"][0] = $nuevoTema;
        } else {
            $cantidad = count($_SESSION["playlist"]);
            $nuevoTema = [
                "id" => $id,
                "nombre" => $nombre,
                "duracion" => $duracion,
                "popularidad" => $popularidad,
                "explicidad" => $explicidad,
                "idArtista" => $artista,
            ];
            $_SESSION["playlist"][$cantidad] = $nuevoTema;
        }
    }
}