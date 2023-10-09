<?php

namespace App\Livewire\UserAccount;
use App\Models\User;
use Livewire\Component;

class Listuser extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }
    public function render()
    {
        return view('livewire.UserAccount.listuser');
    }
}
