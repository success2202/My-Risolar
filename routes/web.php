<?php

use App\Http\Controllers\Manage\ManualPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manage\ProductController;
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



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';


Route::get('/process/products/names', [ProductController::class, 'processImages'])->name('processImages');
Route::get('manual/payment/processes', [ManualPaymentController::class, 'ProcessPayment']);

// Route::get('/dashboard', function () {
//     return view('users.dashboard'); // or any view you want
// })->middleware(['auth'])->name('dashboard');