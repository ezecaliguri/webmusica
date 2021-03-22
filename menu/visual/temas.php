<?php 
include "menu/data/basedatos.php";
?>

<div class="p-4 ">
    <table class="table table-hover table-success ">

    <tr class="table-success ">
        <th width="15%" class="text-center">Nombre</th>
        <th width="15%" class="text-center">Duración</th>
        <th width="15%" class="text-center">Popularidad</th>
        <th width="15%" class="text-center">Explicidad</th>
        <th width="15%" class="text-center">Artista</th>
        <th width="15%" class="text-center">Opciones</th>
        <th width="10%" class="text-center">PlayList</th>
    </tr>
    
    <?php 

        $buscar = new BaseDatos();
        $temas = $buscar->__get("temas");
        foreach($temas as $tema){ 
        
    ?>

    <tr>
        
        <td class="text-center align-middle"><?= $tema["nombre"];?></td>
        <td class="text-center align-middle"><?= round($tema["duracion"] / 60) . " MIN";?></td>               
        <td class="text-center align-middle"><?= $tema["popularidad"];?></td>               
        <td class="text-center align-middle"><?= $tema["explicidad"];?></td>                
        <td class="text-center align-middle"><?= $tema["idArtista"];?></td>                
        
        
        <td class="text-center">            
            <a class="btn btn-warning mt-2 pl-3 pr-3" href="index.php?menu=editar&option=tema&id=<?= $tema["ID"];?> ">Editar</a>
            <a class="btn btn-danger mt-2 " href="process.php?action=borrar&opcion=temas&id=<?= $tema["ID"];?>" onclick="return confirmar()">Eliminar</a>       
            

        </td>
        <td class="text-center align-middle">
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="playlist">
                <input type="hidden" name="task" value="add">
                    <input type="hidden" name="id" id="id" value ="<?= $tema["ID"];?>">
                    <input type="hidden" name="nombre"  id="nombre" value= "<?= $tema["nombre"]?>">
                    <input type="hidden" name="duracion"  id="duracion" value= "<?= $tema["duracion"];?>">
                    <input type="hidden" name="popularidad"  id="popularidad" value= "<?= $tema["popularidad"];?>">
                    <input type="hidden" name="explicidad"  id="explicidad" value= "<?= $tema["explicidad"];?>">
                    <input type="hidden" name="idArtista"  id="idArtista" value= "<?= $tema["idArtista"];?>">

                    <button class= "btn btn-success pl-2 pr-2 text-center " type="submit">
                        Agregar                            
                    </button>
                
            </form>
        </td>
    </tr>

    <?php }?>
    </table>
</div>

<script>
    function confirmar(){
        var respuesta = confirm("¿Estas seguro de eliminar? ¡Al eliminar quitas el registro de la base de datos!");

        if(respuesta){
            return true;
        } else {
            return false;
        }
    }
</script>