<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campaigns;
class CampaignStatus extends Model
{
    use HasFactory;
    protected $table = 'campaign_statuses';

    protected $fillable = [
        'campaign_id',
        'emails_sent',
        'emails_failed',
        'failed_emails',
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaigns::class, 'campaign_id');
    }
}