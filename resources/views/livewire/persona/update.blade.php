<hr>
<form>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nueva Foto:</label>
                <input type="file" class="form-control" wire:model="fotoupdate" accept="image/jpeg, image/png, image/bmp">
                @error('fotoupdate') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la persona:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre " wire:model="nombre">
                @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">apellido de la Persona:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese apellido" wire:model="apellido">
                @error('ruc') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">telefono:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese contacto " wire:model="telefono">
                @error('telefono') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12">
            <label for="exampleFormControlInput1">Dirección de la persona:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese dirección " wire:model="direccion">
            @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fechaNacimiento" wire:model="fecha_nacimiento">
                @error('fechaNacimiento') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12"><br>
            <button wire:click.prevent="update()" class="btn btn-success">actualizar</button>
        </div>
    </div>
</form>
<hr>