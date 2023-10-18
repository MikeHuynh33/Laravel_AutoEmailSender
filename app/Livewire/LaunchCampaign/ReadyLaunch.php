<?php

namespace App\Livewire\LaunchCampaign;
use Illuminate\Support\Facades\File;
use App\Models\Campaigns;
use Livewire\Component;
use App\Jobs\SendEmailCampaignQueueJob;
class ReadyLaunch extends Component
{
    public $listCampaignWithRep;
    public $listCampaignWithAssociatedRep;
    public $selectedCampaign;
    public $selectedCampaignId;
    public $listOfTemplate;
    public $selectedOption;
    public $listOfEmail;
    public $confmodal = false;
    public $chooseTempModel = false;
    public const DIRECTORY = 'email_templates';
    public function mount()
    {
        // call it one time to address all the templates in folder.
        $directory = public_path(self::DIRECTORY);
        if (File::isDirectory($directory)) {
            $htmlFiles = File::files($directory);
            $htmlFiles = array_filter($htmlFiles, function ($file) {
                return $file->getExtension() === 'html';
            });
            $htmlFileNames = array_map(function ($file) {
                return $file->getFilename();
            }, $htmlFiles);
            $this->listOfTemplate = $htmlFileNames;
        } else {
            echo 'The directory does not exist.';
        }
    }
    public function Launch_Btn_Handler($campaign_id)
    {
        $this->confmodal = true;
        $this->selectedCampaignId = $campaign_id;
        // select Campaigns with List of associated Recipients based on $campaign_id
        $campaign = Campaigns::with('recipients')->find($campaign_id);
        $this->selectedCampaign = $campaign->title;
        if ($campaign) {
            // extrieve from $campaign->recipients but only select single column 'email'.
            $recipientEmails = $campaign->recipients->pluck('email')->all();
        } else {
            //
            $recipientEmails = [];
        }
        $this->listCampaignWithAssociatedRep = array_slice(
            $recipientEmails,
            0,
            5
        );
        $this->listOfEmail = $recipientEmails;
    }
    public function Close_Btn_Handler()
    {
        $this->confmodal = false;
        $this->chooseTempModel = false;
    }
    public function ChooseTemp_Btn_Handler()
    {
        $this->confmodal = false;
        $this->chooseTempModel = true;
    }
    public function LaunchConfirmed_Btn_Handler()
    {
        SendEmailCampaignQueueJob::dispatchSync(
            $this->selectedCampaignId,
            $this->listOfEmail,
            $this->selectedOption
        );
        // close modal
        $this->confmodal = false;
        $this->chooseTempModel = false;
    }
    public function render()
    {
        // select all campagin with status active or pending
        $this->listCampaignWithRep = Campaigns::withCount('recipients')
            ->whereIn('status', ['active', 'pending'])
            ->get();
        return view('livewire.launch-campaign.ready-launch');
    }
}