<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campaigns;
class recipients extends Model
{
    use HasFactory;
    protected $table = 'recipients';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'subscription_status',
        'source',
    ];
    public function campaigns()
    {
        return $this->belongsToMany(
            Campaigns::class,
            'campaigns_recipients'
        )->withTimestamps();
    }
}