<?php

namespace App\Livewire\UserAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
class Newuserform extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.UserAccount.newuserform');
    }
    public function storeNewUser()
    {
        // validate input with condition
        $this->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:150|unique:Users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);
        if (Auth::guard('admin')->check()) {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            session()->flash('success', 'User registered successfully.');
        } else {
            $this->addError('Authentication', 'Error , do not have permission');
        }
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
    }
}
