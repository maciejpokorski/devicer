<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\UserDeviceHistory;
use App\Models\User;
use App\Http\Controllers\UserContoller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserContoller::class);

Route::get('/dashboard', function (Request $request) {
    $last_login = $request->session()->get('last_login');
    
    if ($request->user()->is_admin)
    {
        $devices = Device::all();
        $users = User::all();
        $history = UserDeviceHistory::all();

        return view('dashboard-admin', compact('devices', 'users', 'history'));
    }

    return view('dashboard', compact('last_login'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
