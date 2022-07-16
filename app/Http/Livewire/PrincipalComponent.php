<?php

namespace App\Http\Livewire;

use App\Models\Entrada;
use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithPagination;
Use Storage;

class PrincipalComponent extends Component
{
    use WithPagination; // libreria para uso de paginacion
    protected $paginationTheme ="bootstrap"; // activar tema de paginacion
    public $buscar; // variable

    public function getEntradasProperty(){
        // consulta a base de datos
        $busqueda='%'.$this->buscar.'%';
        return Entrada::where('titulo','like',$busqueda)->paginate(10,['*'],'entrada');
    }

    public function render()
    { // comunicar con la vista y mandar colecciones de datos
        return view('livewire.principal-component',[
            'entradas' => $this->getEntradasProperty(),
            'imagenes' => Imagen::all()
        ]);
    }
}
