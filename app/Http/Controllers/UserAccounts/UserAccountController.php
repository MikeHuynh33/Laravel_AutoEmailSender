<?php

namespace App\Http\Controllers\UserAccounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    //
    public function index()
    {
        return view('admin.UserAccounts.UserControlPanel');
    }
}
