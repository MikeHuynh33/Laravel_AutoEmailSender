<?php

namespace App\Livewire\Campaign;
use App\Models\Campaigns;
use Livewire\Component;

class Listcampaign extends Component
{
    public $campaigns;
    public function mount()
    {
        $this->campaigns = Campaigns::all();
    }
    public function render()
    {
        return view('livewire.campaign.listcampaign');
    }
}
