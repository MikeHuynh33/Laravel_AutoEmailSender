<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        return view('admin.dashboard', compact('users'));
    }
}
