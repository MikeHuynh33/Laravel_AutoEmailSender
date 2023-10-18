<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use App\Mail\CampaignEmail;
use App\EmailStatus\CampaignEmailStatus;
use App\Models\CampaignStatus;
use App\Models\Campaigns;
class SendEmailCampaignQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $send_mail;
    private $template;
    private $campaign_id;
    public function __construct($campaign_id, $send_mail, $template)
    {
        $this->campaign_id = $campaign_id;
        $this->send_mail = $send_mail;
        $this->template = $template;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $campaignEmailStatus = new CampaignEmailStatus($this->campaign_id);
        foreach ($this->send_mail as $recipient) {
            try {
                Mail::to($recipient)->send(
                    new CampaignEmail($recipient, $this->template)
                );
                $campaignEmailStatus->emailSent();
            } catch (\Exception $e) {
                $campaignEmailStatus->emailFailed($recipient);
            }
        }
        // keep record by insert the database campaignstatus.
        $campaignStatus = new CampaignStatus();
        if ($campaignEmailStatus) {
            $campaignStatus->emails_sent = $campaignEmailStatus->emailsSent;
            $campaignStatus->campaign_id = $this->campaign_id;
            $campaignStatus->emails_failed = $campaignEmailStatus->emailsFailed;
            if ($campaignEmailStatus->failedEmails) {
                $campaignStatus->failed_emails = json_encode(
                    $campaignEmailStatus->failedEmails
                );
            }
            $campaignStatus->save();
        }
        $campaign = Campaigns::find($this->campaign_id);
        // Update the status
        $campaign->status = 'complete';
        // Save the changes to the database
        $campaign->save();
    }
}