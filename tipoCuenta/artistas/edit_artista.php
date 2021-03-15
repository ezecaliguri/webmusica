<?php include "menu/data/clases/artista.php";  ?>
<div class="p-4">

    <div class="container p-4 alert-success text-center ">
       <h2 class="">¡Cambiar los datos del Artista</h2>
    </div>

    <?php 
        $id = $_GET["id"];
        $buscar = new Artista();
        $listaArtistas = $buscar->__get("mostrarLista");
        foreach ($listaArtistas as $key => $artista){
            if($id == $key){
    ?>

    <div class="container border pt-4  alert alert-success ">
        <form class="row g-3 needs-validation " action="process.php" name="" method="POST">
        <input type="hidden" name="action" value="artista">
        <input type="hidden" name="task" value="edit">
        <input type="hidden" name="id" id="id" value="<?= $id?>">

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Nombre | Dato Actual: <b><?= $artista["nombre"];?></b></label>
            <input type="text" class="form-control"  id="nombre" name="nombre"  required>
            
        </div>


        <div class="col-md-12 text-left mt-2">
            <label for="formFile" class="form-label">Imagen | Dato Actual: <b><?= $artista["imagen"];?> </b></label>
            <span>
                <a href="https://www.youtube.com/watch?v=9VPbdPDXI0Q" class="input-text text-nowrap" target="_blank"> ¿Como lo hago?</a>
            </span>
        </div>
        <div class="col-12 mb-3">
            <input type="url" class="form-control"   aria-describedby="basic-addon3" name="imagen" id="imagen">        
        </div>

        <div class="col-md-6 position-relative">
            <label class="form-label">Email | Dato Actual: <b><?= $artista["email"];?></b></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>


        <div class="col-6 position-relative">
            <label class="form-label">Sitio web | Dato Actual: <b><?= $artista["web"];?></b></label>
            <input type="url" class="form-control" name="url" id="url" required>
        </div>

        <div class="col-12  p-3">
            <button class="btn btn-primary" type="submit">Cambiar</button>
        </div>

        </form>
    </div>
    
    <?php }}?>
</div>