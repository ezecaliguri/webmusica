<?php 
    $listaPlaylist = $_SESSION["playlist"];
    
?>

<div class="p-4">
    <div class="container  alert-success ">
        <h2 name="nombre" class="text-center mb-5">Estas escuchando: <span id="nombre"></span></h2>

        <div class="row pb-5">
            <div class="col-6">
                <label>Autor: <span id="artista"></span></label>
            </div>
            <div class="col-5 progress ">
                <div id= "progress" class="progress-bar inicio animacion " role="progressbar" aria-valuenow="0" aria-voluemin="0" aria-valuemax="100" ></div>
            </div>
        </div>
        <td class="col-6">
            <a class="btn btn-info mb-3" href="index.php?menu=reproducir">Reiniciar</a>
        </td>
        <td class="col-6 ">
            <a class="btn btn-danger mb-3" href="index.php?menu=playlist">Playlist</a>
        </td>
    </div>
    
</div>

<script type="text/javascript">
    // asigno la session a un arreglo en js
    var arrayJS=<?= json_encode($listaPlaylist);?>;
    
    //funcion de animacion, el elemento final se encuentra en "templates/cabecera.php"
    // la animacion ocurre cada 3 segundos
    function animar () {
        document.getElementById("progress").classList.toggle ("final");

    }
    
    // funcion que actualiza cada 3 segundos los datos del arreglo de php traido al js
    // este lo recorre hasta el final del arreglo y luego se cancela el intervalo

    (function (){
        'use strict';
        var nombreTema = document.querySelector('#nombre'); // asigno a una variable el id del span de html
        var nombreArtista = document.querySelector('#artista'); 
        var total = arrayJS.length;

        nombreTema.innerText = arrayJS[0]["nombre"]; // le envio al id de html, el valor del arreglo con el nombre "nombre"
        nombreArtista.innerText = arrayJS[0]["idArtista"];
        animar();

        var i = 1;
        var item = setInterval(function(){
            nombreTema.innerText = arrayJS[i]["nombre"];
            nombreArtista.innerText = arrayJS[i]["idArtista"];
            if (i == total){
                clearInterval(item);
            }
            
            animar();
            i++;
            
        },3000);
    })();

</script>
