<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{
    public $login_id, $password;
    public $returnUrl;

    public function mount(){
        $this->returnUrl = request()->returnUrl;
    }

    public function LoginHandler(){

      

        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if($fieldType == 'email'){
             $this->validate([
                 'login_id'=>'required|email|exists:users,email',
                 'password'=>'required|min:5',
             ],[
                 'login_id'=>'Se requiere correo electrónico o nombre de usuario',
                 'login_id.email'=>'Dirección de correo electrónico no válida',
                 'login_id.exists'=>'El correo electrónico no está registrado',
                 'password.required'=>'Se requiere contraseña',
             ]);
        }else{
            $this->validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:5',
            ],[
                'login_id.required'=>'Se requiere correo electrónico o nombre de usuario',
                'login_id.exists'=>'El nombre de usuario no está registrado',
                'password.required'=>'Se requiere contraseña',
            ]);
        }


        $creds = array($fieldType=>$this->login_id,'password'=>$this->password);

    if( Auth::guard('web')->attempt($creds)){
        $checkUser = User::where($fieldType, $this->login_id)->first();
        if($checkUser->blocked == 1){
             Auth::guard('web')->logout();
             return redirect()->route('author.login')->with('fail','Tu cuenta ha sido bloqueada.');
        }else{
            // return redirect()->route('author.home');
            if( $this->returnUrl != null ){
                return redirect()->to($this->returnUrl);
            }else{
                redirect()->route('author.home');
            }
        }
    }else{
        session()->flash('fail','Correo electrónico/nombre de usuario o contraseña incorrectos');
    }


        //  $this->validate([
        //      'email'=>'required|email|exists:users,email',
        //      'password'=>'required|min:5'
        //  ],[
        //      'email.required'=>'Enter your email address',
        //      'email.email'=>'Invalid email address',
        //      'email.exists'=>'This email is not registered in database',
        //      'password.required'=>'Password is required'
        //  ]);

        //  $creds = array('email'=>$this->email, 'password'=>$this->password);

        //  if( Auth::guard('web')->attempt($creds) ){

        //     $checkUser = User::where('email', $this->email)->first();
        //     if($checkUser->blocked == 1){
        //         Auth::guard('web')->logout();
        //         return redirect()->route('author.login')->with('fail','Your account had been blocked.');
        //     }else{
        //         return redirect()->route('author.home');
        //     }

        //  }else{
        //      session()->flash('fail','Incorrect email or password');
        //  }
    }
    public function render()
    {
        return view('livewire.author-login-form');
    }
}
