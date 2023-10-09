<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignControlPanel extends Controller
{
    public function index()
    {
        return view('admin.Campaign.CampaignControlPanel');
    }
}
