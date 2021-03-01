<?php 
session_start();

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
            $artistas = $_SESSION["artistas"];
            add_artista($artistas);            
            return_index();
            break;
        case ("empresa"): 
            $empresas = $_SESSION["empresas"];
            add_empresa($empresas);
            return_index();
            break;
        case ("usuario"):
            $usuarios = $_SESSION["usuarios"];
            add_usuario($usuarios);
            return_index();
            break;
        case ("borrar"):
            $opcion = $_GET["opcion"];
            $id = $_GET["id"];
            switch ($opcion){
                case ("artistas"):
                    $artistas = $_SESSION["artistas"];
                    delete($id,$artistas,"artistas");
                    break;
            }
            
        case ("stop"): 
            session_destroy();
            return_index();
            break;
    }
}

function add_artista($artistas){    

    $imagen = $_POST["imagen"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $tipoCuenta = "artista";
    $url = $_POST["url"];

    $nuevo_artista = [
        "imagen" => $imagen,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "email" => $email,
        "tipoCuenta" => $tipoCuenta,
        "url" => $url,
    ];
    array_push($artistas,$nuevo_artista);
    save_info($artistas,"artistas");
}

function add_empresa($empresas){    

    $imagen = $_POST["imagen"];
    $nombre = $_POST["nombre"];
    $fundacion = $_POST["fundacion"];
    $email = $_POST["email"];
    $tipoCuenta = "empresa";
    $url = $_POST["url"];

    $nueva_empresa = [
        "imagen" => $imagen,
        "nombre" => $nombre,
        "fundacion" => $fundacion,
        "email" => $email,
        "tipoCuenta" => $tipoCuenta,
        "url" => $url,
    ];
    array_push($empresas,$nueva_empresa);
    save_info($empresas,"empresas");
}

function add_usuario($usuarios){    

    $imagen = $_POST["imagen"];
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $email = $_POST["email"];
    $tipoCuenta = "empresa";
    $ciudad = $_POST["ciudad"];

    $nuevo_usuario = [
        "imagen" => $imagen,
        "nombre" => $nombre,
        "pais" => $pais,
        "email" => $email,
        "tipoCuenta" => $tipoCuenta,
        "ciudad" => $ciudad,
    ];
    array_push($usuarios,$nuevo_usuario);
    save_info($usuarios,"usuarios");
}


function return_index() {
    header("LOCATION: index.php");
}

function save_info($var,$var2) {
    unset($_SESSION["$var2"]);
    $_SESSION["$var2"] = $var;
}

function delete($id,$var,$var2){
    if(in_array($id,array_keys($var))){
        unset($var[$id]);
        save_info($var,$var2);
    }
}