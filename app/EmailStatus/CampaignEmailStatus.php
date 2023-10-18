<?php
namespace App\EmailStatus;

class CampaignEmailStatus
{
    public $campaignId;
    public $emailsSent = 0;
    public $emailsFailed = 0;
    public $failedEmails = [];

    public function __construct($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    public function emailSent()
    {
        $this->emailsSent++;
    }

    public function emailFailed($email)
    {
        $this->emailsFailed++;
        $this->failedEmails[] = $email;
    }
}
?>