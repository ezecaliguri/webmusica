<div class="p-4">
    <div class="container p-4 alert-success text-center ">
       <h2 class="">¡Seleccione tipo de cuenta!</h2>
    </div>
    <div class="container border pt-4  alert alert-success ">
        <form action="index.php?menu=agregar" class="text-center" method="get">
            <input type="hidden" name="menu" value="agregar">
            <select  class="p-2" name="option" id="option">
                <option value="artista">Artista</option>
                <option value="empresa">Empresa</option>
                <option value="usuario">Usuario</option>
            </select>
            <div class="col-12  p-3">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
    </div>

</div>