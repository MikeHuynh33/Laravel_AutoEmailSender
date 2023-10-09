<?php

namespace App\Livewire;

use Livewire\Component;

class TableChart extends Component
{
    public $chartData;
    public function render()
    {
        return view('livewire.includes.table-chart');
    }
}
