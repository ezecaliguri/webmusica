<?php 

include "menu/data/clases/artista.php";


?>

<div class="p-4 ">
    <table class="table table-hover table-info align-middle ">

    <tr class="table-info">
        <th width="15%" class="text-center">Imagen</th>
        <th width="20%" class="text-center">Nombre</th>
        
        <th width="20%" class="text-center">Email</th>
        <th width="15%" class="text-center">Url</th>
        <th width="10%" class="text-center">Opciones</th>
    </tr>

    <?php 

        $buscar = new Artista();
        $listaArtistas = $buscar->__get("mostrarLista");
        foreach ($listaArtistas as $key => $artista){
    ?>

    <tr>
        <td class="text-center">
        <div class="card-img-top p-2">
        <img src="<?= $artista["imagen"];?>" 
                class="" 
                alt="..." 
                data-bs-toggle="popover" 
                title= ""            
                height= "100px"
            ></div>
        </td>

        <td class="text-center"><?= $artista["nombre"];?></td>
                      
        <td class="text-center"><?= $artista["email"];?></td>                
        <td class="text-center"><a href="<?= $artista["url"];?>" class="input-text text-nowrap" target="_blank">Sitio web</a></td>
        
        <td class="text-center">            
            
            <a class="btn btn-success mt-2 pl-4 pr-3" href="index.php?menu=editar&option=artista&id=<?= $artista["ID"];?> ">Editar</a>
            
            <a class="btn btn-danger mt-2 " href="process.php?action=borrar&opcion=artistas&id=<?= $artista["ID"];?> ">Eliminar</a>         

        </td>
    </tr>

    <?php }?>
    </table>
</div>