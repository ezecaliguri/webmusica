<?php 

session_start();
include_once "templates/cabecera.php";
include_once "data/data.php";

if(!$_SESSION['artistas']) {
    require_once('data/data.php');
    $_SESSION['artistas'] = $artistas;
} else {
    $artistas = $_SESSION['artistas'];
}
if(!$_SESSION['usuarios']) {
    require_once('data/data.php');
    $_SESSION['usuarios'] = $usuarios;
} else {
    $usuarios = $_SESSION['usuarios'];
}
if(!$_SESSION['empresas']) {
    require_once('data/data.php');
    $_SESSION['empresas'] = $empresas;
} else {
    $empresas = $_SESSION['empresas'];
}
?>

 


<div class="container mt-4">
    <div class="table-responsive">
        <div class=" navbar-light bg-light">
            <div class="d-flex bd-highlight">
                <a class="navbar-brand p-2  bd-highlight text-primary" href="index.php?menu=artistas">Artista</a>
                <a class="navbar-brand p-2  bd-highlight text-success" href="index.php?menu=empresas">Empresa</a>
                <a class="navbar-brand p-2 flex-grow-1 bd-highlight text-danger" href="index.php?menu=usuarios">Usuario</a>            
                <a class="btn btn-info mt-2 mr-2  bd-highlight" href="index.php?menu=agregar">Agregar</a>
            </div>

            <?php 
                if(isset($_GET["menu"])){
                    $opcion = $_GET["menu"];
                    switch ($opcion){

                        case "artistas": 
                            include "menu/artistas.php";
                            break;
                        case "usuarios": 
                            include "menu/usuarios.php";
                            break;
                        case "empresas": 
                            include "menu/empresas.php";
                            break;
                        case "agregar":

                            
                            if (empty($_GET["option"])){ 
                                include "insertar/options.php";
                            } else {
                                $opcion = $_GET["option"];
                                switch ($opcion){
                                    case "artista": 
                                        include "insertar/add_artista.php";
                                        break;
                                    case "empresa":
                                        include "insertar/add_empresa.php";
                                        break;
                                    case "usuario":
                                        include "insertar/add_usuario.php";
                                        break;
                                }
                            }
                            break;
                    }
                } else {
                    include "menu/default.php";
                }
            ?>
            
        </div>
    </div>
    
</div>
    