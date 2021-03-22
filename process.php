<?php 
include "menu/data/playlist.php";
include "menu/data/basedatos.php";


if(isset($_POST["action"]) || isset($_GET["action"])){
    if (isset($_POST['action'])) {
        $action = $_POST['action']; 
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "";
    }

    switch ($action){

        case ("artista"):                   
            $task = $_POST["task"];
            switch ($task) {
                // Agrega un nuevo artista a la base de datos luego de recibir
                // los datos del formulario
                case ("add"):

                    $imagen = $_POST["imagen"];
                    $nombre = $_POST["nombre"];
                    $email = $_POST["email"];
                    $url = $_POST["url"];

                    $nuevo = [$nombre,$email,$imagen,$url];

                    $new = new BaseDatos();
                    $new->__set("agregarArtista",$nuevo);
                    header("LOCATION: index.php");               

                    break;
                // recibe los datos cambiados del formulario del artista
                case ("edit"):
                    $id = $_POST["id"];
                    $imagen = $_POST["imagen"];
                    $nombre = $_POST["nombre"];
                    $email = $_POST["email"];
                    $url = $_POST["url"];

                    $cambio = [$id,$nombre,$email,$imagen,$url];
                    $editar = new BaseDatos();
                    $editar->__set("editarArtista",$cambio);
                    header("LOCATION: index.php?menu=artistas");
                    break;
                
            }

            break;

        case ("playlist"): 
            $task = $_POST["task"];
            switch ($task) {
                case ("add"): 
                    // Asigna un nuevo tema a una session
                    // Si la session no se encuentra iniciada la crea
                    // sino, le agrega un nuevo registro al final

                    $id = $_POST["id"];
                    $nombre = $_POST["nombre"];
                    $duracion  = $_POST["duracion"];
                    $popularidad  = $_POST["popularidad"];
                    $explicidad = $_POST["explicidad"];
                    $artista  = $_POST["idArtista"];

                    $new = new Playlist();
                    $new->set_playlist($id,$nombre,$duracion,$popularidad,$explicidad,$artista);
                    header("LOCATION: index.php?menu=temas");
                    break;
                
                case ("del"): 
                    // Elimina un registro de la session
                    $id = $_POST["id"];
                    $borrar = new Playlist();
                    $borrar->eliminarTemaPlaylist($id);
                    header("LOCATION: index.php?menu=playlist");
                    break;
            }
            
            break;
        case ("tema"):
            $task = $_POST["task"];
            switch ($task){
                // Agrega un tema nuevo a la bd recibiendo los formularios
                case ("add"):

                    $nombre = $_POST["nombre"];
                    $duracion = $_POST["duracion"];
                    $popularidad = $_POST["popularidad"];
                    $explicidad = $_POST["explicidad"];
                    // la idea era que reciba un dato especifico de la llave primaria, pero 
                    // por falta de tiempo se cambio
                    $idArtista = $_POST["idArtista"];
                    
                    $nuevo = [$nombre,$duracion,$popularidad,$explicidad,$idArtista];

                    $new = new BaseDatos();
                    $new->__set("agregarTema",$nuevo);
                    header("LOCATION: index.php?menu=temas");
                    break;
                case ("edit"):
                    $id = $_POST["id"];
                    $nombre = $_POST["nombre"];
                    $duracion = $_POST["duracion"];
                    $popularidad = $_POST["popularidad"];
                    $explicidad = $_POST["explicidad"];
                    $idArtista = $_POST["idArtista"];

                    $cambio = [$id,$nombre,$duracion,$popularidad,$explicidad,$idArtista];
                    $editar = new BaseDatos();
                    $editar->__set("editarTema",$cambio);
                    header("LOCATION: index.php?menu=temas");
                    break;
            }
            break;

        case ("edit"): 
            // envia al formulario para editar los datos del artista
            include "tipoCuenta/artistas/edit_artista.php";
            break;

        case ("stop"):
            // Destruye la $_SESSION 
            session_destroy();
            header("LOCATION: index.php");
            break;

        case ("borrar"):
            // elimina registros de la bd
            $opcion = $_GET["opcion"];
            switch($opcion){
                case ("artistas"):
                    $id = $_GET["id"];
                    $borrar = new BaseDatos();
                    $borrar->__set("eliminarArtista",$id);
                    Redirecciones::header("artistas");
                    break;
                case ("temas"):
                    $id = $_GET["id"];
                    $borrar = new BaseDatos();                    
                    $borrar->__set("eliminarTema",$id);
                    Redirecciones::header("temas");
                    break;
            }
            break;
    }
}
