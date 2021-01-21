<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\UserDeviceHistory;
use App\Models\User;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\UserDeviceHistoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\NoteController;
use App\Http\Middleware\OnlyForAdmin;
use Illuminate\Support\Facades\Auth;

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
Route::middleware([OnlyForAdmin::class])->group(function () {
    Route::resource('users', UserContoller::class);
    Route::resource('devices', DeviceController::class);
    Route::resource('histories', UserDeviceHistoryController::class);
});

Route::resource('notes', NoteController::class)->middleware(['auth', 'notes']);

Route::get('/dashboard', function (Request $request) {
    $last_login = $request->session()->get('last_login');
    $note = User::find(Auth::user()->id)->noteCurrent();
    
    if ($request->user()->is_admin)
    {
        $devices = Device::all();
        $users = User::all();
        $history = UserDeviceHistory::all();

        return view('dashboard-admin', compact('devices', 'users', 'history'));
    }

    return view('dashboard', compact('last_login', 'note'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
