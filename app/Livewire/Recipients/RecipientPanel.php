<?php

namespace App\Livewire\Recipients;

use Livewire\Component;

class RecipientPanel extends Component
{
    public $openRecipientForm = false;
    public $openView = true;
    public function Recipient_handleCLick()
    {
        $this->openRecipientForm = true;
        $this->openView = false;
    }
    public function View_handleCLick()
    {
        $this->openRecipientForm = false;
        $this->openView = true;
    }
    public function render()
    {
        return view('livewire.Recipients.recipient-panel');
    }
}