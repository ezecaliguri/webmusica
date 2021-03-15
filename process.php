<?php 
include "menu/data/clases/artista.php";
include "menu/data/clases/playlist.php";
include "menu/data/clases/temas.php";


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

                    $new = new Artista();
                    $new->set_new_artista($nombre,$email,$imagen,$url);
                    $new->return_index();

                    break;
                // recibe los datos cambiados del formulario del artista
                case ("edit"):
                    $id = $_POST["id"];
                    $imagen = $_POST["imagen"];
                    $nombre = $_POST["nombre"];
                    $email = $_POST["email"];
                    $url = $_POST["url"];

                    $new = new Artista();
                    $new->set_edit_artista($id,$nombre,$email,$imagen,$url);
                    $new->return_index();
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
                    $new->temas_index();
                    break;
                
                case ("del"): 
                    // Elimina un registro de la session
                    $id = $_POST["id"];
                    $borrar = new Playlist();
                    $borrar->eliminarTemaPlaylist($id);
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

                    $new = new Temas();
                    $new->set_new_tema($nombre,$duracion,$popularidad,$explicidad,$idArtista);
                    $new->return_index();
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
            $new = new Entity ();
            $new->return_index();
            break;
        case ("borrar"):
            // elimina registros de la bd
            $opcion = $_GET["opcion"];
            switch($opcion){
                case ("artistas"):
                    $id = $_GET["id"];
                    $new = new Artista();
                    $new->del_artista($id);
                    $new->return_index();
                    break;
                case ("temas"):
                    $id = $_GET["id"];
                    $new = new Temas();
                    $new->del_tema($id);
                    $new->return_index();
                    break;
            }
            break;
    }
}
