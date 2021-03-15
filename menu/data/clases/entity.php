<?php

// clase principal que solo realiza relocaciones 

class Entity {
    
    function return_index() {
        header("LOCATION: index.php");
    }

    function temas_index(){
        header("LOCATION: index.php?menu=temas");
    } 

    function playlist_index(){
        header("LOCATION: index.php?menu=playlist");
    } 

}