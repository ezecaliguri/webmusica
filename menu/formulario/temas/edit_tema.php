<?php include "menu/data/basedatos.php";?>

<div class="p-4">

    <div class="container p-4 alert-success text-center ">
       <h2 class="">¡Cambiar los datos del Tema!</h2>
    </div>

    <?php 
        $id = $_GET["id"];
        $buscar = new BaseDatos();
        $listaTemas = $buscar->__get("temas");
        foreach ($listaTemas as $key => $tema){
            if($id == $key){
    ?>

    <div class="container border pt-4  alert alert-success ">
        <form class="row g-3 needs-validation " action="process.php" name="add_empresa" method="POST">
        <input type="hidden" name="action" value="tema">
        <input type="hidden" name="task" value="edit">
        <input type="hidden" name="id" id="id" value="<?= $id;?>">

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Nombre | Dato Actual: <b><?= $tema["nombre"];?></b></label>
            <input type="text" class="form-control" id="nombre" name="nombre"  required>
            
        </div>

        <div class="col-md-3 position-relative">
            <label for="validationTooltip02" class="form-label">Duración(Segundos) | Dato Actual: <b><?= $tema["duracion"];?></b></label>
            <input type="number" class="form-control" id="duracion" name="duracion"  required>
            
        </div>

        <div class="col-md-3 position-relative">
            <label for="validationTooltip02" class="form-label">Popularidad | Dato Actual: <b><?= $tema["popularidad"];?></b></label>
            <input type="number" class="form-control" id="popularidad" name="popularidad"  required>
            
        </div>

        <div class="form-group col-md-3 ">
            <label  class="col-form-label">Explicidad <b><?= $tema["explicidad"];?></b></label>
            <select name="explicidad" id="explicidad" class="form-control" tabindex="9">
                <option>Si</option>
                <option>No</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label  class="col-form-label">Artista <b><?= $tema["idArtista"];?></b></label>
            <select name="idArtista" id="idArtista" class="form-control" tabindex="9">
                <option>Ariana Grande</option>
                <option>Maluma</option>
                <option>Luis Miguel</option>
                <option>Soledad Pastorutti</option>
                <option>Ricardo Arjona</option>
            </select>
        </div>

        <div class="col-12  p-3">
            <button class="btn btn-primary" type="submit">Cambiar</button>
        </div>

        </form>
    </div>
    <?php }}?>
    
</div>