<?php

namespace App\Http\Controllers\Templates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplatePanelController extends Controller
{
    public function index()
    {
        return view('admin.Templates.TemplatesPanel');
    }
}