<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Categoria;
use Livewire\Component;

class Productos extends Component{


    
public $nombre,$categoria_id,$estado,$producto_id,$categoria;
public function render(){
    $productos=Producto::where("estado",1)->get();
    $categorias=Categoria::where('estado',1)->get();
    
    return view('livewire.productos',["productos"=>$productos,"categorias"=>$categorias],);
    return view('livewire-select-anidado',["categorias"->categorias::all()]);
}

public function guardar(){

    $producto=new producto;
    $producto->nombre=$this->nombre;
    $producto->categoria_id=$this->categoria;
    
    $producto->estado=1;
    $producto->save();
    $this->cancelar();
}
public function editar($id_cliente){
    $cliente=cliente::find($id_cliente);
    $this->cliente_id=$id_cliente;
    $this->nombre=$cliente->nombre;
    $this->apellido=$cliente->apellido;
    $this->direccion=$cliente->direccion;
    $this->telefono=$cliente->telefono;

}

public function cancelar(){
   
    $this->nombre="";
    $this->categoria_id="";
 
}

public function actualizar(){

    $cliente=cliente::find($this->cliente_id);
    $cliente->nombre=$this->nombre;
    $cliente->apellido=$this->apellido;
    $cliente->direccion=$this->direccion;
    $cliente->telefono=$this->telefono  ;
    $cliente->estado=1;
    $cliente->update();

    $this->cancelar();
}

public function eliminar($id_cliente){
        $cliente=cliente::find($id_cliente);
        $cliente->estado=0;
        $cliente->update();
}
}