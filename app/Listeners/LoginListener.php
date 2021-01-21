<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserDeviceHistory;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;

class LoginListener
{
    /**
     * Request
     */
    private $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(LoginRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->assignDevice($event->user);
        $this->initHistory(Auth::user());
        $this->saveLastLoginTimeInSession();
    }

    /**
     * Connect user with device and vice versa.
     *
     * @return void
     */
    private function assignDevice($user)
    {
        $device_id = $this->request->get('device');
        if($device_id)
        {
            $device = Device::findOrFail($device_id);

            $device->user_id = $user->id;
            $device->save();
            $user->device_id = $device_id;
            $user->save();
        }
    }

     /**
     * Create record for archivization
     *
     * @return void
     */
    private function initHistory($user)
    {
        $device = $user->device;
        $sessionKey = 'user_'.$user->id;

        $history = UserDeviceHistory::create([
            'user_id' => $user->id,
            'device_id' => $user->device_id,
            'millage_old' => $device->millage,
            'updated_at' => null,
            'is_accesable_old' => $device->is_accesable
        ]);
        
        $sessionValue = $history->id;
        session([$sessionKey => $sessionValue]);
    }

    private function saveLastLoginTimeInSession()
    {
        $sessionKey = 'last_login';
        $sessionValue = Carbon::now();
        session([$sessionKey => $sessionValue]);
    }
}
