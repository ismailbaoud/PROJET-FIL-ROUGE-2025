<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;




Route::get('/', [HomeController::class , 'index']);
//hunter
Route::get('/register_hunter', [AuthController::class , 'showRegisterHunter']);
Route::post('/register', [AuthController::class , 'HunterRegister'])->name('register');
Route::get('/register_entreprise', [AuthController::class , 'showRegisterentreprise']);
Route::post('/EntrepriseRegister', [AuthController::class , 'EntrepriseRegister']);
Route::get('/loginPage', [AuthController::class , 'showLogin']);
Route::post('/login', [AuthController::class , 'Login']);



// entreprises
Route::get('/tr/dashboard', function () {
    return view('pages.entreprise/entreprise');
})->name("entrepriseDashboard");
Route::get('/tr/payment', function () {
    return view('pages.entreprise/payment');
});
Route::get('/tr/programs', function () {
    return view('pages.entreprise/programs');
});
Route::get('/tr/reports', function () {
    return view('pages.entreprise/reports');
});
Route::get('/tr/settings', function () {
    return view('pages.entreprise/settings');
});


// administration 
Route::get('/dm/dashboard', function () {
    return view('pages.admin/admin');
})->name('adminDashboard');
Route::get('/dm/users', function () {
    return view('pages.admin/user_management');
});
Route::get('/dm/programs', function () {
    return view('pages.admin/programs');
});
Route::get('/dm/reports', function () {
    return view('pages.admin/reports');
});
Route::get('/dm/transactions', function () {
    return view('pages.admin/transactions');
});
Route::get('/dm/green-rooms', function () {
    return view('pages.admin/rooms');
});
Route::get('/dm/logs', function () {
    return view('pages.admin/logs');
});
Route::get('/dm/settings', function () {
    return view('pages.admin/settings');
});


// hunter 
Route::get('/ht/dashboard', function () {
    return view('pages.hunter/hunter');
})->name("hunterDashboard");
// Route::get('/dm/users', function () {
//     return view('pages.admin/user_management');
// });
Route::get('/ht/programs', function () {
    return view('pages.hunter/programs');
});
Route::get('/ht/reports', function () {
    return view('pages.hunter/reports');
});
Route::get('/ht/leaderboard', function () {
    return view('pages.hunter/leaderboard');
});
Route::get('/ht/messages', function () {
    return view('pages.hunter/messages');
});
Route::get('/ht/settings', function () {
    return view('pages.hunter/settings');
});
// Route::get('/dm/settings', function () {
//     return view('pages.admin/settings');
// });

// Route::get('/dm/dashboard', function () {
//     return view('pages.entreprise/settings');
// });

