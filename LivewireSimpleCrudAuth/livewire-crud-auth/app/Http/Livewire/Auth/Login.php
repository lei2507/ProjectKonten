<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|email:dns',
        'password' => 'required',
    ];

    public function mount()
    {
        if(Cookie::has('useremail') && Cookie::has('userpass')) {
            $this->email = Cookie::get('useremail');
            $this->password = Cookie::get('userpass');
        }
    }

    public function updated()
    {
        $this->validate();
    }

    public function login()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            if($this->remember) {
                Cookie::queue('useremail', $this->email, 1440);
                Cookie::queue('userpass', $this->password, 1440);
            }
            return redirect()->route('product.index');
        } else {
            return back()->with('error', 'Login gagal! Email atau password anda salah');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
