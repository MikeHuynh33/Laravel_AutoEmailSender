<?php

namespace App\Livewire\LaunchCampaign;

use Livewire\Component;

class LaunchPanel extends Component
{
    public $openReadyLaunch = true;
    public $openLaunched = false;
    public $openFailtureLaunched = false;
    public function ReadyLaunch_handleCLick()
    {
        $this->openReadyLaunch = true;
        $this->openLaunched = false;
        $this->openFailtureLaunched = false;
    }
    public function Launched_handleCLick()
    {
        $this->openReadyLaunch = false;
        $this->openLaunched = true;
        $this->openFailtureLaunched = false;
    }
    public function FailtureLaunched_handleCLick()
    {
        $this->openReadyLaunch = false;
        $this->openLaunched = false;
        $this->openFailtureLaunched = true;
    }
    public function render()
    {
        return view('livewire.launch-campaign.launch-panel');
    }
}