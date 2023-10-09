<?php

namespace App\Livewire\Campaign;

use Livewire\Component;

class Campaignpanel extends Component
{
    public $openCampaignForm = false;
    public $openView = true;
    public function Campaign_handleCLick()
    {
        $this->openCampaignForm = true;
        $this->openView = false;
    }
    public function View_handleCLick()
    {
        $this->openCampaignForm = false;
        $this->openView = true;
    }
    public function render()
    {
        return view('livewire.campaign.campaignpanel');
    }
}
