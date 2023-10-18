<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipients;
use App\Models\CampaignStatus;
class campaigns extends Model
{
    protected $table = 'campaigns';
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'type',
        'content',
    ];
    public function recipients()
    {
        return $this->belongsToMany(
            Recipients::class,
            'campaigns_recipients'
        )->withTimestamps();
    }
    public function campaignStatus()
    {
        return $this->hasOne(CampaignStatus::class, 'campaign_id');
    }
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}