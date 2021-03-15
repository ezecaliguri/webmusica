<?php 
include_once "templates/cabecera.php";
include_once "funciones/global/conexion.php";

?>

 


<div class="container mt-4">
    <div class="table-responsive">
        <div class=" navbar-light bg-light">
            <div class="d-flex bd-highlight">
                <a class="navbar-brand p-2  bd-highlight text-primary" href="index.php?menu=artistas">Artista</a>
                <a class="navbar-brand p-2  bd-highlight text-success" href="index.php?menu=temas">Temas</a>
                <a class="navbar-brand p-2 flex-grow-1 bd-highlight text-danger" href="index.php?menu=playlist">Playlist</a>            
                <a class="btn btn-info mt-2 mr-2  bd-highlight" href="index.php?menu=agregar">Agregar</a>
            </div>

            <?php 

                // recorre todos los botones de la pagina a traves de GET

                if(isset($_GET["menu"])){
                    $opcion = $_GET["menu"];
                    switch ($opcion){

                        case "artistas": 
                            include "menu/visual/artistas.php";
                            break;
                        case "playlist": 
                            include "menu/visual/playlist.php";
                            break;
                        case "temas": 
                            include "menu/visual/temas.php";
                            break;
                        case "agregar":                            
                            if (empty($_GET["option"])){ 
                                include "tipoCuenta/options.php";
                            } else {
                                $opcion = $_GET["option"];
                                switch ($opcion){
                                    case "artista": 
                                        include "tipoCuenta/artistas/add_artista.php";
                                        break;
                                    case "tema":
                                        include "tipoCuenta/temas/add_tema.php";
                                        break;
                                }
                            }
                            break;
                        case ("reproducir"): 
                            include "menu/visual/reproductor.php";
                            break;
                        case ("editar"):
                            $opcion = $_GET["option"];
                            switch ($opcion) {
                                case ("artista"):
                                    include "tipoCuenta/artistas/edit_artista.php";
                                    break;
                                
                            }
                    }
                } else {
                    include "menu/visual/default.php";
                }
            ?>
            
        </div>
    </div>
    
</div>
    