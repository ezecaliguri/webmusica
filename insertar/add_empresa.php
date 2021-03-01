<div class="p-4">

    <div class="container p-4 alert-success text-center ">
       <h2 class="">¡Ingrese los datos de la Empresa!</h2>
    </div>

    <div class="container border pt-4  alert alert-success ">
        <form class="row g-3 needs-validation " action="process.php" name="add_empresa" method="POST">
        <input type="hidden" name="action" value="empresa">

        <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"  required>
            
        </div>

        <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">Fundación</label>
            <input type="number" class="form-control" id="fundacion" name="fundacion"  required>
            
        </div>

        <div class="col-md-9 text-left mt-2">
            <label for="formFile" class="form-label">Ingresar Logo en formato URL &nbsp;&nbsp; </label>
            <span>
                <a href="https://www.youtube.com/watch?v=9VPbdPDXI0Q" class="input-text text-nowrap" target="_blank"> ¿Como lo hago?</a>
            </span>
        </div>
        <div class="col-12 mb-3">
            <input type="url" class="form-control"   aria-describedby="basic-addon3" placeholder="https://LinkDeEjemplo.com/" name="imagen" id="imagen">        
        </div>

        <div class="col-md-6 position-relative">
            <label class="form-label">Email de la Empresa</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>


        <div class="col-6 position-relative">
            <label class="form-label">Ingrese web de la Empresa</label>
            <input type="url" class="form-control" name="url" id="url" required>
        </div>

        <div class="col-12  p-3">
            <button class="btn btn-primary" type="submit">Ingresar</button>
        </div>

        </form>
    </div>

</div>