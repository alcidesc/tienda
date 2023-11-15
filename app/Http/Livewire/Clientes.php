<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class Clientes extends Component{

public $nombre,$apellido,$direccion,$telefono,$estado,$cliente_id;
public function render(){
    $clientes=Cliente::where("estado",1)->get();
    return view('livewire.clientes',["clientes"=>$clientes]);
}

public function guardar(){

    $cliente=new cliente;
    $cliente->nombre=$this->nombre;
    $cliente->apellido=$this->apellido;
    $cliente->direccion=$this->direccion;
    $cliente->telefono=$this->telefono;
    $cliente->estado=1;
    $cliente->save();

    
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
    $this->cliente_id="";
    $this->nombre="";
    $this->apellido="";
    $this->direccion="";
    $this->telefono="";
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