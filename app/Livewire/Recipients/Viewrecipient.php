<?php

namespace App\Livewire\Recipients;
use App\Models\Campaigns;
use Livewire\Component;

class Viewrecipient extends Component
{
    public $listCampaignWithRep;
    public function render()
    {
        return view('livewire.recipients.viewrecipient');
    }
    public function mount()
    {
        $this->listCampaignWithRep = Campaigns::withCount('recipients')->get();
    }
}