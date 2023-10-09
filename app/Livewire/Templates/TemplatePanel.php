<?php

namespace App\Livewire\Templates;

use Livewire\Component;

class TemplatePanel extends Component
{
    public $openTemplateForm = false;
    public $openView = true;
    public function Recipient_handleCLick()
    {
        $this->openTemplateForm = true;
        $this->openView = false;
    }
    public function View_handleCLick()
    {
        $this->openTemplateForm = false;
        $this->openView = true;
    }
    public function render()
    {
        return view('livewire.templates.template-panel');
    }
}