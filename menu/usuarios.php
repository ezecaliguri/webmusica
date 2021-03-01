<?php 
include_once "data/data.php";

if(!$_SESSION['usuarios']) {
    require_once('data/data.php');
    $_SESSION['usuarios'] = $usuarios;
} else {
    $usuarios = $_SESSION['usuarios'];
}
?>
<div class="p-4">
    <table class="table  table-hover table-danger align-middle">

    <tr class="table-danger">
        <th width="15%" class="text-center">Imagen</th>
        <th width="20%" class="text-center">Nick</th>
        <th width="20%" class="text-center">Pais</th>
        <th width="20%" class="text-center">Ciudad</th>
        <th width="15%" class="text-center">Email</th>
        <th width="10%" class="text-center">Opciones</th>
    </tr>

    <?php foreach($usuarios as $key => $usuario){ ?>

    <tr>
        <td class="text-center">
        <div class="card-img-top p-2">
        <img src="<?= $usuario["imagen"];?>" 
                class="" 
                alt="..." 
                data-bs-toggle="popover" 
                title= ""            
                height= "100px"
            ></div>
        </td>

        <td class="text-center"><?= $usuario["nombre"];?></td>
        <td class="text-center"><?= $usuario["pais"];?></td>               
        <td class="text-center"><?= $usuario["ciudad"];?></td>                
        <td class="text-center"><?= $usuario["email"];?></td>                
        
        
        <td class="text-center">
            <form action="" method="post">
                <input 
                type="hidden" 
                name="ID" 
                id="ID" 
                value= "<?= $usuarios[$key];?>">
                
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