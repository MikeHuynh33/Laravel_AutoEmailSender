<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipients;
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
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}