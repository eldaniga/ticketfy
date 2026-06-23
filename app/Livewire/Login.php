<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class Login extends Component
{
    public $alias="";
    public $password="";

    public function login()
    {
        
        $rules = [
            "alias" => ['required', 'string', 'min:3'],
            "password" => ['required', 'string', 'min:8'],
        ];

        $credentials = $this->validate($rules);

        if(Auth::guard("admin")->attempt($credentials)){
            session()->regenerate();
            return redirect()->to("/dashboard");
        }
    
        $this->addError('alias', 'Las credenciales no coinciden con nuestros registros.');

        if(Auth::attempt($credentials)){
            session()->regenerate();
            return redirect()->intended("/dashboard");
            
        }
     }
    
         

   

    public function render()
    {
        return view('livewire.login');
    }
};
