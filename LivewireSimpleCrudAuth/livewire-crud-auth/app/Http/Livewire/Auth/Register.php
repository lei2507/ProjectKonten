<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'email' => 'required|email:dns|unique:users,email',
        'password' => 'required_with:password_confirmation|min:6|max:20|confirmed',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        if($user) {
            return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
        } else {
            return back()->with('error', 'Akun gagal dibuat');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
