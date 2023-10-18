<?php

namespace App\Livewire\Recipients;
use Livewire\WithFileUploads;
use App\Imports\RecipientImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;
use App\Models\Campaigns;
use Illuminate\Support\Facades\Log;
use App\Models\Recipients;
class Newrecipientform extends Component
{
    use WithFileUploads;
    public $excelFile;
    public $selectedCampaign;
    public $data = [];
    public $listCampaign;
    public $listCampaignWithRep;
    public $hiddenForm = true;
    public $first5Recipients;
    public $last5Recipients;
    public function mount()
    {
        $this->listCampaign = Campaigns::All();
    }
    public function render()
    {
        return view('livewire.recipients.newrecipientform');
    }

    public function uploadReview()
    {
        $this->validate([
            'excelFile' => 'required|mimes:xlsx,xls',
        ]);
        try {
            $this->data = Excel::toArray(
                new RecipientImport(),
                $this->excelFile
            )[0];
            $this->hiddenForm = false;
            $this->first5Recipients = collect($this->data)->take(5);
            $this->last5Recipients = collect($this->data)->slice(-5);
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'An error occurred while processing the file.'
            );
        }
    }
    public function storeRecipient()
    {
        $campaignId = $this->selectedCampaign;
        $campaign = Campaigns::find($campaignId);
        try {
            foreach ($this->data as $recipientData) {
                // Check If Recipient exists
                $existingRecipient = Recipients::where(
                    'email',
                    $recipientData['email']
                )->first();
                if (!$existingRecipient) {
                    // Create a new recipient
                    $recipient = new Recipients([
                        'name' => $recipientData['name'],
                        'email' => $recipientData['email'],
                        'phone_number' => $recipientData['phone'],
                        'address' => $recipientData['address'],
                        'source' => $recipientData['source'],
                    ]);
                    $recipient->save();
                } else {
                    // if recipient existed , update association with new campaign.
                    $recipient = $existingRecipient;
                }
                // Save the recipient to obtain its ID to accociate with campaign.
                try {
                    $campaign = Campaigns::find($campaignId);
                    $campaign->recipients()->syncWithoutDetaching($recipient);
                } catch (\Exception $e) {
                    session()->flash(
                        'success',
                        'Recipients have been failed to store and associate with the campaign.'
                    );
                }
            }
            session()->flash(
                'success',
                'Recipients have been successfully stored and associated with the campaign.'
            );

            // Optionally, you can reset the properties to their initial state
            $this->reset([
                'excelFile',
                'selectedCampaign',
                'data',
                'hiddenForm',
                'first10Recipients',
                'last10Recipients',
            ]);
        } catch (\Exception $e) {
            session()->flash(
                'error',
                'An error occurred while storing recipients: ' .
                    $e->getMessage()
            );
        }
    }
}