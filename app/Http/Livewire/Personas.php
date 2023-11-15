<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

use Livewire\WithPagination;

class Personas extends Component{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $persona_id, $direccion, $apellido, $telefono,$fecha_nacimiento;
    
    public $updateMode = false;

    public function render(){

    $personas = Persona::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        return view('livewire.persona.personas',["personas"=>$personas]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->apellido = '';
        $this->telefono = '';
        $this->direccion = '';
        $this->fecha_nacimiento='';

    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
        ]);


        Persona::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'fecha_nacimiento' => $this->fecha_nacimiento,

        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'agregado correctamente!']);

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $persona = Persona::where('id',$id)->first();
        $this->nombre = $persona->nombre;
        $this->persona_id = $persona->id;
        $this->apellido= $persona->apellido;
        $this->telefono = $persona->telefono;
        $this->direccion = $persona->direccion;
        $this->fecha_nacimiento= $persona->fecha_nacimiento;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',

        ]);

        if ($this->persona_id) {
            $persona = Persona::find($this->persona_id);
            $persona->update([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'fecha_nacimiento' => $this->fecha_nacimiento,
            ]);
            $this->updateMode = false;
            $this->emit('alert', ['type' => 'success', 'message' => 'actualizado correctamente!']);
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $persona = Persona::find($id);
            $persona ->estado=0;
            $persona ->update();
            $this->emit('alert', ['type' => 'error', 'message' => 'eliminado correctamente!']);
        }
    }
}
