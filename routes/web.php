<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\entreprises\DashboardController as dashboardEntreprise;
use App\Http\Controllers\entreprises\ProgramController as entrepriseProgram;
use App\Http\Controllers\entreprises\ReportController as ReportEntreprise;
use App\Http\Controllers\entreprises\ScopeController as scopeController;
use App\Http\Controllers\entreprises\SettingsController as settingsEntroprise;
use App\Http\Controllers\entreprises\RewardController as RewardEntroprise;
use App\Http\Controllers\entreprises\TransactionController as entropriseTransactions;

use App\Http\Controllers\hunters\DashboardController as dashboardHunter;
use App\Http\Controllers\hunters\LeaderboardController as LeaderboardController;
use App\Http\Controllers\hunters\ProgramController as hunterPrograms;
use App\Http\Controllers\hunters\ReportController as ReportHunter;
use App\Http\Controllers\hunters\SettingsController as hunterSettingsController;


use App\Http\Controllers\admin\DashboardController as adminDashboard;
use App\Http\Controllers\admin\UserManagementController as adminUserManagement;
use App\Http\Controllers\admin\ProgramController as adminPrograms;
use App\Http\Controllers\admin\ReportController as adminReports;
use App\Http\Controllers\admin\TransactionController as adminTransactions;
use App\Http\Controllers\admin\SettingsController as adminSettings;


//main routes (home & auth)

    Route::view('/', 'pages.home')->name('home');
    Route::get('/register_hunter', [AuthController::class , 'showRegisterHunter'])->name('showRegisterHunter');
    Route::post('/register', [AuthController::class , 'HunterRegister'])->name('hunterRegister');
    Route::get('/register_entreprise', [AuthController::class , 'showRegisterentreprise'])->name('showRegisterentreprise');
    Route::post('/EntrepriseRegister', [AuthController::class , 'EntrepriseRegister'])->name('entrepriseRegister');
    Route::get('/loginPage', [AuthController::class , 'showLogin'])->name('showLogin');
    Route::post('/login', [AuthController::class , 'Login'])->name('login');
    Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
    Route::get('/auth/github', [AuthController::class, 'redirectToGitHub'])->name('auth.github');
    Route::get('/auth/github/callback', [AuthController::class, 'handleGitHubCallback']);


//end



//entreprise 

    //dashboard
    Route::get('/tr/dashboard', [dashboardEntreprise::class, 'index'])->name('showEntrepriseDashboard');

    //programs
    Route::get('/tr/programs', [entrepriseProgram::class, 'index'])->name('entreprisePrograms');
    Route::post('/tr/programs/create', [entrepriseProgram::class, 'create'])->name('createProgram');
    Route::post('/tr/programs/{id}/update', [entrepriseProgram::class, 'update'])->name('entreprise_program_edit');
    Route::delete('/tr/programs/{id}/delete', [entrepriseProgram::class, 'delete'])->name('entreprise_program_delete');
    
    //scope
    Route::get('/programs/{program}/scopes/create', [ScopeController::class, 'create'])->name('scopes.create');
    Route::post('/programs/{program}/scopes', [ScopeController::class, 'store'])->name('scopes.store');
    Route::get('/scopes/{scope}/edit', [ScopeController::class, 'edit'])->name('scopes.edit');
    Route::put('/scopes/{scope}', [ScopeController::class, 'update'])->name('scopes.update');
    Route::delete('/scopes/{scope}', [ScopeController::class, 'destroy'])->name('scopes.destroy');
    
    //settings
    Route::get('/tr/settings', [settingsEntroprise::class, 'index'])->name('settingsEntreprise');
    Route::post('/tr/settings/update', [settingsEntroprise::class, 'update'])->name('Entreprise_settings_update');
    Route::get('/tr/settings/delete', [settingsEntroprise::class, 'delete'])->name('Entreprise_settings_delete');

    //reports
    Route::get('/tr/reports', [ReportEntreprise::class, 'index'])->name('reportEntreprise');
    Route::put('/tr/reports/{id}/update', [ReportEntreprise::class, 'updateStatus'])->name('entreprise_report_update');

    //rewards
    Route::get('/tr/reward/{id}', [RewardEntroprise::class, 'index'])->name('entreprise_reward_index');
    Route::post('/tr/reward/{report}/submit', [RewardEntroprise::class, 'submitReward'])->name('entreprise_reward_submit');
    Route::get('/stripe/success', [RewardEntroprise::class, 'stripeSuccess'])->name('stripe.success');

    Route::get('tr/transactions', [entropriseTransactions::class, 'index'])->name('entrepriseTransactions');


    
//end

//hunter
    
    //dashboard
    Route::get('/ht/dashboard', [dashboardHunter::class, 'index'])->name('hunterDashboard');

    //programs
    Route::get('/ht/programs', [hunterPrograms::class, 'index'])->name('programs');
    Route::post('/programs/{id}/join', [hunterPrograms::class, 'joinProgram'])->name('programs.join');
    Route::get('/ht/myprograms', [hunterPrograms::class, 'joinedPrograms']);
    Route::get('/ht/program_details/{id}', [hunterPrograms::class, 'show'])->name('programDetails');

    //reports
    Route::get('/ht/reports', [ReportHunter::class, 'index'])->name('hunter_report_index');
    Route::get('/report/details/{id}', [ReportEntreprise::class, 'show'])->name('hunter_report_details');
    Route::get('/ht/report/submit/{id}', [ReportHunter::class, 'showSubmitForm'])->name('hunter_report_submit');
    Route::post('/ht/report/store/{id}', [ReportHunter::class, 'store'])->name('hunter_report_store');
    Route::delete('/ht/report/{report}/delete', [ReportHunter::class, 'destroy'])->name('hunter_report_delete');
    
    //leaderboard
    Route::get('/ht/leaderboard', [LeaderboardController::class , 'index'])->name('leaderBoard');
    
    //settings
    Route::get('/ht/settings/{id}', [hunterSettingsController::class, 'index'])->name('hunter.profile');
    Route::post('/ht/settings/update', [hunterSettingsController::class, 'update'])->name('hunter_settings_update');
    Route::patch('/ht/settings/payment/info', [hunterSettingsController::class, 'storeOrUpdatePaymentInfo'])->name('hunter_settings_payment');
    Route::post('/hunter/upload-avatar', [hunterSettingsController::class, 'uploadAvatar'])->name('hunter_upload_avatar');

    //end
    


// administration 
Route::get('/dm/dashboard', [adminDashboard::class , 'index'])->name('adminDashboard');

Route::get('/dm/users', [adminUserManagement::class , 'index']);
Route::patch('/dm/users/{id}/update', [adminUserManagement::class , 'changeStatus'])->name('updateUser');
Route::get('/dm/users/{id}/delete', [adminUserManagement::class , 'destroy'])->name('deleteUser');

Route::get('/dm/programs', [adminPrograms::class , 'index']);
Route::patch('/dm/programs/{id}/update', [adminPrograms::class , 'changeStatus'])->name('updateProgram');
Route::get('/dm/programs/{id}/delete', [adminPrograms::class , 'destroy'])->name('deleteProgram');

Route::get('/dm/reports', [adminReports::class, 'index']);
Route::get('/dm/reports/{report}/delete', [adminReports::class , 'destroy'])->name('deleteReport');

Route::get('/dm/transactions', [adminTransactions::class , 'index']);

Route::get('/dm/settings', [adminSettings::class , 'index']);
Route::get('/dm/settings/{user}', [adminSettings::class , 'update'])->name('adminSettingsUpdate');
