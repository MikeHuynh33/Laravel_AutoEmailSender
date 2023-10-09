<?php

namespace App\Livewire\UserAccount;

use Livewire\Component;

class AccountUser extends Component
{
    public $openCreateForm = false;
    public $openView = true;
    public function Account_handleCLick()
    {
        $this->openCreateForm = true;
        $this->openView = false;
    }
    public function View_handleCLick()
    {
        $this->openCreateForm = false;
        $this->openView = true;
    }
    public function render()
    {
        return view('livewire.UserAccount.account-user');
    }
}
