<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class CampaignEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($recipient, $emailTemplate)
    {
        $this->recipient = $recipient;
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Test 101',
        );
    }

    /**
     * Get the message content definition.
     */
   public function content(): Content
    {
    // remove html only take file name , views will auto detect blade.php
    $modifiedFileName = str_replace('.html', '', $this->emailTemplate);
    return new Content(
        view: ('email_templates.' . $modifiedFileName),
    );
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}