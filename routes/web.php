    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BankController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome page
Route::view('/', 'pages.login');
// Route::view('/welcome', 'layouts.welcome');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'registerCustomer']);
});

Route::get('/check-auth', function() {
    return auth()->check() ? 'Authenticated' : 'Not Authenticated';
});


// Authenticated routes
Route::middleware(['web','auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');

    // Account routes
    Route::get('/statement', [AccountController::class, 'getStatementPage'])->name('statement');
    Route::match(['get', 'post'], '/statement', [AccountController::class, 'getStatement'])->name('statement');
    Route::get('/statement/pdf', [AccountController::class, 'exportStatementPDF'])->name('statement.pdf');
    Route::get('/statement/email', [AccountController::class, 'sendStatementEmail'])->name('statement.email');

    Route::get('/deposit', [AccountController::class, 'depositAmountPage'])->name('deposit');
    Route::post('/deposit', [AccountController::class, 'depositAmount']);

    Route::get('/withdraw', [AccountController::class, 'withdrawAmountPage'])->name('withdraw');
    Route::post('/withdraw', [AccountController::class, 'withdrawAmount']);

    Route::get('/update_account', [AccountController::class, 'updateAccount'])->name('update_account');
    Route::get('/close_account', [AccountController::class, 'closeAccount'])->name('close_account');

    Route::get('/check_balance', [AccountController::class, 'checkBalancePage'])->name('check_balance');
    Route::post('/check_balance', [AccountController::class, 'checkBalance']);
});

// Customer routes
Route::get('/whoami', [CustomerController::class, 'forgotAccountNumber'])->name('whoami');
Route::get('/findme', [CustomerController::class, 'forgotPassword'])->name('findme');

// Bank routes
Route::get('/aboutus', [BankController::class, 'aboutUs'])->name('aboutus');
Route::get('/contactus', [BankController::class, 'contactUs'])->name('contactus');