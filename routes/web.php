<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth\AdminDashboardController;
use App\Http\Controllers\UserAccounts\UserAccountController;
use App\Http\Controllers\Campaign\CampaignControlPanel;
use App\Http\Controllers\Recipients\RecipientController;
use App\Http\Controllers\Templates\TemplatePanelController;
use App\Http\Controllers\LaunchCampaign\LaunchCampaignPanel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/dashboard', function () {
    return view('auth.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('auth.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'auth.profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'auth.profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'auth.profile.destroy'
    );
    Route::post('email/verification-notification', [
        EmailVerificationNotificationController::class,
        'store',
    ])->name('verification.send');
});

// create the accessiable route to admin's dashboard

Route::middleware(['auth.admin:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [
        AdminDashboardController::class,
        'index',
    ])->name('admin.dashboard');
    Route::get('/admin/dashboard/UserControlPanel', [
        UserAccountController::class,
        'index',
    ])->name('admin.dashboard.userControlPanel');
    Route::get('/admin/dashboard/CampaignControlPanel', [
        CampaignControlPanel::class,
        'index',
    ])->name('admin.dashboard.campaignControlPanel');
    Route::get('/admin/dashboard/recipientControlPanel', [
        RecipientController::class,
        'index',
    ])->name('admin.dashboard.RecipientControlPanel');
    Route::get('/admin/dashboard/TemplatePanel', [
        TemplatePanelController::class,
        'index',
    ])->name('admin.dashboard.TemplatePanel');
    Route::get('/admin/dashboard/LaunchCampaignPanel', [
        LaunchCampaignPanel::class,
        'index',
    ])->name('admin.dashboard.LaunchCampaignPanel');
});

Route::get('/auth/content', function () {
    return view('auth.content');
})
    ->middleware(['auth', 'verified'])
    ->name('auth.content');

require __DIR__ . '/auth.php';

// give directory to adiminAuth middleware functions
require __DIR__ . '/adminauth.php';

Auth::routes();
Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');