<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserDeviceHistory;

class UnAssignDevice
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;

        $this->assign($user);
        $this->updateHistory($user); 
    }

    private function assign($user)
    {
        $device = $user->device;

        $device->user_id = NULL;
        $device->save();
        $user->device_id = NULL;
        $user->save();
    }

    private function updateHistory($user)
    {
        $device = $user->device;
        $sessionKey = 'user_'.$user->id;
        $historyId = session($sessionKey);
        
        $history = UserDeviceHistory::findOrFail($historyId);
        $history->millage_new = $device->millage ?? 0;
        $history->is_accesable_new = $device->is_accesable;
        $history->save();
        
        session()->forget($sessionKey);
    }
}
