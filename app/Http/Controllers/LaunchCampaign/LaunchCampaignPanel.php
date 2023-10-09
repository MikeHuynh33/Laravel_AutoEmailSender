<?php

namespace App\Http\Controllers\LaunchCampaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaunchCampaignPanel extends Controller
{
    public function index()
    {
        return view('admin.LaunchCampaign.LaunchCampaignPanel');
    }
}