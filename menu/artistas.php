<?php 

include_once "data/data.php";

if(!$_SESSION['artistas']) {
    require_once('data/data.php');
    $_SESSION['artistas'] = $artistas;
} else {
    $artistas = $_SESSION['artistas'];
}
?>

<div class="p-4 ">
    <table class="table table-hover table-info align-middle ">

    <tr class="table-info">
        <th width="15%" class="text-center">Imagen</th>
        <th width="20%" class="text-center">Nombre</th>
        <th width="20%" class="text-center">Apellido</th>
        <th width="20%" class="text-center">Email</th>
        <th width="15%" class="text-center">Url</th>
        <th width="10%" class="text-center">Opciones</th>
    </tr>

    <?php foreach($artistas as $key => $artista){ ?>

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
        <td class="text-center"><?= $artista["apellido"];?></td>               
        <td class="text-center"><?= $artista["email"];?></td>                
        <td class="text-center"><a href="<?= $artista["url"];?>" class="input-text text-nowrap" target="_blank">Sitio web</a></td>
        
        <td class="text-center">
            <form action="process.php" name="delete" method="post">
                <input type="hidden" name="action" value="editar">
                <input type="hidden" name="id" id="id" value= "<?= $artistas[$key];?>">        
                <button 
                    class= "btn btn-success mt-2 pl-4 pr-3" 
                    type="submit" 
                    name="enviarcarrito" 
                    value="borrar">Editar                            
                </button>
            </form>

            <button class="btn btn-danger mt-2 ">
                <a class="" href="process.php?action=borrar&opcion=artistas&id=<?= $key;?>">Eliminar</a>
            </button>

            
        </td>
    </tr>

    <?php }?>
    </table>
</div>