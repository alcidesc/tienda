<div>
    <div>
        <div class="row">
            <div class="col-md-12"> 
                @if($updateMode)
                    @include('livewire.persona.update')
                @else
                    @include('livewire.persona.create')
                @endif
            </div>
                    @if (session()->has('toastr'))
            <script>
                const toastrOptions = @json(session('toastr.options', []));
                toastr['{{ session('toastr.type', 'info') }}']('{{ session('toastr.message') }}', '', toastrOptions);
            </script>
        @endif
            <div class="col-md-12">
                  <input wire:model="search" class="form-control" type="search" placeholder="Buscar ">
            </div>
        </div>
        <br>
         <div class="row table-responsive">
            @if ($personas->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>IMAGEN</th>
                            <th>Nombres</th>
                            <th>apellido</th>
                            <th>telefono</th>
                            <th>Direcccion</th>
                            <th>fecha de nacimiento</th>
                            <th>tu edad es</th>
                            <th>Acciones</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($personas as $prov)
                            <tr>
                                <tr>
                                    <td>
                                        @if ($prov->foto)
                                            <img src="{{ asset('/images/productos/' . $prov->foto) }}" alt="{{ $prov->nombre }}" width="50px">
                                        @else
                                            <span>Sin foto</span>
                                        @endif
                                    </td>
                                <td>{{ $prov->nombre }}</td>
                                <td>{{ $prov->apellido}}</td>
                                <td>{{ $prov->telefono }}</td>
                                <td>{{ $prov->direccion }}</td>
                                <td>{{ $prov->fecha_nacimiento }}</td>
                                <td>{{ $this->calcularEdad($prov->fecha_nacimiento) }}</td> <!-- Nueva celda para mostrar la edad -->
                                <td>
                                    <button wire:click="edit({{ $prov->id }})" class="btn btn-sm btn-info">Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $prov->id }}"><i class="far fa-trash-alt"></i></button>
    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$prov->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedor</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                                <p>¿Realmente quiere eliminar  {{ $prov->nombre }}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button" wire:click="delete({{ $prov->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="col-12 alert alert-warning">
                    No se encuentran registros para {{ $search }}
                </div>
            @endif 
            <script>
                document.addEventListener('livewire:load', function () {
                    Livewire.on('alert', function (data) {
                        alert(data.message);
                    });
                });
            </script>
            
        </div>
    </div>
</div>
