<?php 
include_once "data/data.php";


?>

<div class="p-4">
    <table class="table table-hover table-success align-middle">

    <tr class="table-success">
        <th width="15%" class="text-center">Imagen</th>
        <th width="20%" class="text-center">Nombre</th>
        <th width="20%" class="text-center">Fundación</th>
        <th width="20%" class="text-center">Email</th>
        <th width="15%" class="text-center">Url</th>
        <th width="10%" class="text-center">Opciones</th>
    </tr>

    <?php foreach($empresas as $key => $empresa){ ?>

    <tr>
        <td class="text-center">
        <div class="card-img-top p-2">
        <img src="<?= $empresa["imagen"];?>" 
                class="" 
                alt="..." 
                data-bs-toggle="popover" 
                title= ""            
                height= "100px"
            ></div>
        </td>

        <td class="text-center"><?= $empresa["nombre"];?></td>
        <td class="text-center"><?= $empresa["fundacion"];?></td>               
        <td class="text-center"><?= $empresa["email"];?></td>                
        <td class="text-center"><a href="<?= $empresa["url"];?>" class="input-text text-nowrap" target="_blank">Sitio web</a></td>
        
        <td class="text-center">
            <form action="" method="post">
                <input 
                type="hidden" 
                name="ID" 
                id="ID" 
                value= "<?= $empresas[$key];?>">
                
                <!-- Envio un value de eliminar con el ID  -->
                <button 
                    class= "btn btn-success pl-4 pr-3 text-center" 
                    type="submit" 
                    name="enviarcarrito" 
                    value="borrar">Editar                            
                </button>
                <button 
                    class= "btn btn-danger mt-2" 
                    type="submit" 
                    name="enviarcarrito" 
                    value="borrar">Eliminar                            
                </button>
            </form>
        </td>
    </tr>

    <?php }?>
    </table>
</div>