<?php

namespace App\Http\Livewire;

use App\Models\Categoria;

use Livewire\Component;

class Categorias extends Component{
    public $descripcion,$categoria_id,$estado;
    public function render(){
        $categorias=Categoria::where("estado",1)->get();
        return view('livewire.categorias',["categorias"=>$categorias]);
    }

    public function guardar(){

        $categoria=new Categoria;
        $categoria->descripcion=$this->descripcion;
        $categoria->estado=1;
        $categoria->save();
        
        $this->descripcion="";
    }
    public function editar($id_categoria){
        $categoria=Categoria::find($id_categoria);
        $this->categoria_id=$id_categoria;
        $this->descripcion=$categoria->descripcion;
    }

    public function cancelar(){
        $this->categoria_id="";
        $this->descripcion="";
        
    }

    public function actualizar(){

        $categoria=categoria::find($this->categoria_id);
        $categoria->descripcion=$this->descripcion;
        $categoria->estado=1;
        $categoria->update();

        $this->cancelar();
    }

    public function eliminar($id_categoria){
        $categoria=Categoria::find($id_categoria);
            $categoria->estado=0;
        $categoria->update();
    }


}