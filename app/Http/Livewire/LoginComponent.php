<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class LoginComponent extends Component
{
    public $usuario,$pass; // variables
    public function render()
    { // comunicar con la vista
        return view('livewire.login-component');
    }

    public function  change(){
        // encriptar contrasena
        if(!empty($this->pass)){
           $encriptada = Crypt::encryptString($this->pass);
           $this->pass=$encriptada;

        } else{
            $this->pass= '';
        }
    }

    public function login(){
        $this->validate([
            'usuario'=> 'required|string|max:75',
            'pass'=> 'required|string|min:7'

        ]);
        // desencriptar contrasena
        $desencriptada =Crypt::decryptString($this->pass);
        $this->pass=$desencriptada;
        // validar credenciales
        if($this->usuario =="estudiante" && $this->pass =="campoyvida"){

            session(['usuario'=>$this->usuario]);

            $this->msjexito();
            return redirect('/entradas');
        } else{
            $this->msjdelete();
        }
        $this->default();
    }

    // cerrar sesion
    public function  logout(){
        session()->invalidate();
        $this->msjcerrar();
        $this->default();
        return redirect('/login');
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Bienvenido']);
    }

    public function msjcerrar(){
        $this->dispatchBrowserEvent('alert2',['message'=>'cerro sesión correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'credenciales no validad, verifique usuario y contraseña']);
    }

    public function default(){
        $this->usuario = '';
        $this->pass = '';
    }
}
