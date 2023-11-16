<hr>
<form>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group text-center">
                <label>Foto del producto:</label><br>
                @if($updateMode)
                    @if($fotoupdate) 
                        <img src="{{ $fotoupdate->temporaryUrl() }}" class="img-thumbnail" width="200px;">
                    @else
                        <img src="{{ asset('/images/productos/'.$foto) }}" class="img-thumbnail" width="200px;">
                    @endif
                    <input type="file" class="form-control mt-2" wire:model="fotoupdate" accept="image/jpeg, image/png, image/bmp">
                @else
                    @if($foto) 
                        <img src="{{ $foto->temporaryUrl() }}" class="img-thumbnail" width="200px;">
                    @else
                        <img src="{{ asset('imgsystem/producto.png') }}" class="img-thumbnail" width="200px;">
                    @endif
                    <input type="file" class="form-control mt-2" wire:model="foto" accept="image/jpeg, image/png, image/bmp">
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre de la persona:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre" wire:model="nombre">
                        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellido">Apellido de la Persona:</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Ingrese apellido" wire:model="apellido">
                        @error('apellido') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" placeholder="Ingrese contacto" wire:model="telefono">
                        @error('telefono') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección de la persona:</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" wire:model="direccion">
                        @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fechaNacimiento" wire:model="fecha_nacimiento">
                        @error('fecha_nacimiento') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<hr>
