<?php 
include "process.php";
// include "menu/data/playlist.php";
?>

<?php 
        if (!empty($_SESSION["playlist"])) {
            
    ?>
<div class="p-4">
    <table class="table  table-hover table-danger align-middle">

        <tr class="table-danger">
            <th width="15%" class="text-center">Nombre</th>
            <th width="20%" class="text-center">Duración</th>
            <th width="20%" class="text-center">Popularidad</th>
            <th width="20%" class="text-center">Explicidad</th>
            <th width="15%" class="text-center">Artista</th>
            <th width="10%" class="text-center">Quitar Tema</th>
        </tr>

        <?php 
            $total = count($_SESSION["playlist"]);
            foreach ($_SESSION["playlist"] as $temasplaylist){ 
        ?>

        <tr>
            <div class="card-img-top p-2">

            <td class="text-center align-middle"><?= $temasplaylist["nombre"];?></td>
            <td class="text-center align-middle"><?= round($temasplaylist["duracion"] / 60) . " MIN";?></td>               
            <td class="text-center align-middle"><?= $temasplaylist["popularidad"];?></td>                
            <td class="text-center align-middle"><?= $temasplaylist["explicidad"];?></td>                
            <td class="text-center align-middle"><?= $temasplaylist["idArtista"];?></td>                
            
            
            <td class="text-center">
                <form action="" method="post">
                <input type="hidden" name="action" value="playlist">
                <input type="hidden" name="task" value="del">
                <input type="hidden" name="id" id="id" value= "<?= $temasplaylist["id"];?>">                
                <button class= "btn btn-danger mt-2" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        

        <?php } } else {?>
            <div class="alert alert-success p-4 m-4 mb-3">
            No hay temas en la Playlist
            </div>
        <?php }?>

        <?php if(!empty($_SESSION["playlist"])) { ?>
        <form action="" method="get">
            <tr>
                <td colspan="2" ><h4>Total de temas: <?= $total; ?></h4></td>
                <td>
                <a class="btn btn-info" href="index.php?menu=reproducir">Reproducir</a>
                </td>
            </tr>
        </form>
        <?php }?>

    </table>
</div>