<?php

namespace App\Livewire\Campaign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Campaigns;
class Newcampagin extends Component
{
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $status = 'pending';
    public $type;
    public $content;

    public function render()
    {
        return view('livewire.campaign.newcampagin');
    }
    public function storeNewCampaign()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,complete,pending',
            'type' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Campaigns::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'type' => $this->type,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Campaign created successfully.');

        $this->reset([
            'title',
            'description',
            'start_date',
            'end_date',
            'status',
            'type',
            'content',
        ]);
    }
}
