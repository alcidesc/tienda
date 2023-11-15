<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" wire:model="nombre" placeholder="Nombre Nombre" />
            </div>
            <br></br>
            <div class="col-md-12">
                @if($categoria_id)
                    <button type="button" class="btn btn-primary" wire:click="actualizar()">Actualizar</button>
                    <button type="button" class="btn btn-danger" wire:click="cancelar()">Cancelar</button>
                @else    
                    <button type="button" class="btn btn-primary" wire:click="guardar()">Guardar</button>
                @endif
            </div>
            <br></br>
        </div> 
    </div>
<table  class="table table-striped">
<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">descripcion</th>     
    </tr>
    </thead>
    <tbody>
    @foreach($categorias as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->descripcion}}</td>

        <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#vistaModal{{$item->id}}"><i class="far fa-eye"></i></button>
            <button type="button" class="btn btn-primary" wire:click="editar({{$item->id}})"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" wire:click="eliminar({{$item->id}})"><i class="fas fa-trash"></i></button>
        </td>
                <!-- Modal -->
                <div class="modal fade" id="vistaModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="vistaModal{{$item->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vistaModal{{$item->id}}Label">Datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p><b>ID: </b>{{$item->id}}</p>
                    <p><b>Categoria: </b>{{$item->descripcion}}</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </tr>
    @endforeach
</tbody>
</table>
</div>