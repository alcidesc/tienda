<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Image, file;

class Personas extends Component{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $collapsed="collapsed-card",$collapsedicon="fa-plus";
    public $updateMode = false,$fila="id",$orden="desc";
    public $search='';
    
    public $nombre, $persona_id, $direccion, $apellido, $telefono,$fecha_nacimiento,
    $hoy,$fechaNacimiento,$foto,$fotoupdate,$nombreFoto;
    

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
        $this->foto='';

    }

            public function store()
        {
            $validatedData = $this->validate([
                'nombre' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de tener reglas de validación para la imagen
            ]);

            $nombreFoto = '';

            if ($file = $this->foto) {
                $control = 0;
                $nombreFoto = rand() . "." . $file->getClientOriginalExtension();

                while ($control == 0) {
                    if (is_file(public_path() . '/images/productos/' . $nombreFoto)) {
                        $nombreFoto = rand() . "." . $file->getClientOriginalExtension();
                    } else {
                        Image::make($file)
                            ->heighten(1000)
                            ->save(public_path() . '/images/productos/' . $nombreFoto);
                        $control = 1;
                    }
                }
            }

            Persona::create([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'foto' => $nombreFoto, // Utiliza la variable local $nombreFoto aquí
            ]);

            $this->emit('alert', ['type' => 'success', 'message' => 'Agregado correctamente']);
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
    $validatedData = $this->validate([
        'nombre' => 'required',
        'fotoupdate' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($this->persona_id) {
        $persona = Persona::find($this->persona_id);

        // Actualizar otros campos
        $persona->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        // Actualizar la foto si se proporciona una nueva
        if ($file = $this->fotoupdate) {
            $nombreFoto = rand() . "." . $file->getClientOriginalExtension();
            $control = 0;

            while ($control == 0) {
                if (is_file(public_path() . '/images/productos/' . $nombreFoto)) {
                    $nombreFoto = rand() . $nombreFoto;
                } else {
                    // Subir la nueva imagen
                    Image::make($file)
                        ->heighten(1000)
                        ->save(public_path() . '/images/productos/' . $nombreFoto);
                    $control = 1;
                }
            }

            // Una vez que la nueva imagen ha sido guardada, actualizamos el atributo 'foto' de la persona
            $persona->foto = $nombreFoto;
            $persona->save(); // Guardar el modelo actualizado
        }

        $this->updateMode = false;
        $this->emit('alert', ['type' => 'success', 'message' => 'Actualizado correctamente']);
        $this->resetInputFields();
    }
}


    public function delete($id){
        if($id){
            $persona = Persona::find($id);
            $persona ->estado=0;
            $persona ->update();
            $this->emit('alert', ['type' => 'error', 'message' => 'eliminado correctamente!']);
        }
    }
   

        public function calcularEdad($fechaNacimiento)
        {
            $fechaNacimiento = new \DateTime($fechaNacimiento);
            $hoy = new \DateTime();
            $edad = $hoy->diff($fechaNacimiento);

            return $edad->y; 
        }
        public function collapsed(){
            if($this->collapsed){
                $this->collapsed="";
                $this->collapsedicon="fa-minus";
            }else{
                $this->collapsed="collapsed-card";
                $this->collapsedicon="fa-plus";
            }
        }
}
