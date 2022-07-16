<?php

namespace App\Http\Livewire;

use App\Models\Entrada;
use App\Models\Imagen;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
Use Storage;

class BlogComponent extends Component
{

    use WithPagination, WithFileUploads;// librerias para paginacion y cargar archivos
    protected $paginationTheme ="bootstrap"; // selecionar el tema para paginacion
    public $entrada_id,$titulo,$descripcion; // variables publicas
    public $imagen_id,$url=[],$url2,$url3,$identificador,$identificador2;
    public $buscar;


    public function  mount(){
        // Detectar actualizacion de las imagenes
        $this->identificador = rand();
        $this->identificador2 = rand();
    }
    public function getEntradasProperty(){
        // consulta de base de datos
        $busqueda='%'.$this->buscar.'%';
        return Entrada::where('titulo','like',$busqueda)->orwhere('descripcion','like',$busqueda)->paginate(8,['*'],'entrada');
    }
    public function render()
    {
        // comunicar con las vistra, y mandar colecciones de datos
        return view('livewire.blog-component',[
            'entradas' => $this->getEntradasProperty(),
            'imagenes'=> Imagen::all() // consulta a base de datos
        ]);
    }
    public function store(){
        $this->validate([
            'titulo'=> 'required|string|max:75',
            'descripcion'=> 'required|string|max:5000'
        ]);
        // resgitrar en la table entrada
        Entrada::create([
            'titulo'=> $this->titulo,
            'descripcion'=> $this->descripcion,

        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        // cargar datos en los fomularios para editar entrada
        $entrada= Entrada::find($id); // consulta de base de datos
        $this->entrada_id = $entrada->id;
        $this->titulo = $entrada->titulo;
        $this->descripcion = $entrada->descripcion;
    }

    public function update(){
        $this->validate([
            'titulo'=> 'required|string|max:75',
            'descripcion'=> 'required|string|max:5000'
        ]);
        // consulta para editar tabla de entrada
        $entrada= Entrada::find($this->entrada_id);

            $entrada->update([
                'titulo'=> $this->titulo,
                'descripcion'=> $this->descripcion,
                'update_at'=>''
            ]);

        $this->msjedit();
        $this->default();
    }

    public function addasignar($id){
        // buscar id de entrada
        $entrada=Entrada::find($id);
        $this->entrada_id=$entrada->id;
    }
    public function regasignar(){
        $this->validate([
            'url.*'=> 'required|image|max:2048',
            'entrada_id'=> 'required|integer'
        ]);
        foreach ($this->url as $key => $image){
            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
           //  $image2= $this->url->store('portadas','public');
             $image= $this->url[$key]->store('portadas','public_uploads');
            /*fin*/
            // registrar url de imagen con su respectivo id de entrada
            Imagen::create([
                'url'=> $image,
                'entrada_id'=> $this->entrada_id
            ]);





        }

        $this->msjexito2();
        $this->default();
    }

    public function editasignar($id){
        //  buscar en tabla imagenes



        $imagen= Imagen::find($id);
        $this->imagen_id = $imagen->id;
        $this->entrada_id = $imagen->entrada_id;
        $this->url3=$imagen->url;
    }

    public function updateasignar(){
        $this->validate([
            'entrada_id'=> 'required|integer'
        ]);
        // consulta de imagen
        $ima= Imagen::find($this->imagen_id);
        if(!empty($this->url2)){
            // eliminar archivo existente
              Storage::disk('public_uploads')->delete($ima->url);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->url2->store('portadas','public_uploads');
            /*fin*/
            $ima->update([
                'url'=> $image,
                'entrada_id'=> $this->entrada_id
            ]);
        } else{
            $ima->update([
                'entrada_id'=> $this->entrada_id
            ]);
        }
        $this->msjeditimg();
        $this->default();

    }

    public function destroy($id){
        $imagen= Imagen::find($id);
        // eliminar archivo existente
        Storage::disk('public_uploads')->delete($imagen->url);
        //eliminar
        Imagen::destroy($id);
        $this->msjdelete();
    }

    public function default(){
        $this->titulo = '';
        $this->descripcion = '';
        $this->url = '';
        $this->url2 = '';
        $this->url3 = '';
        $this->entrada_id = '';
        $this->buscar = '';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Entrada registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Entrada editada correctamente']);
    }

    public function msjexito2(){
        $this->dispatchBrowserEvent('alertasignar',['message'=>'Fotografía registrada correctamente']);
    }
    public function msjeditimg(){
        $this->dispatchBrowserEvent('alerteditasignar',['message'=>'Fotografía editada correctamente']);
    }
    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Fotografía eliminada correctamente']);
    }

}
