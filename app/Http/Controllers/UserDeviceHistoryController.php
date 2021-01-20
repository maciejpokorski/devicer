<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use App\Models\UserDeviceHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDeviceHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = UserDeviceHistory::latest()->paginate(5);

        return view('history.index', compact('history'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        $users = User::all();
        return view('history.create', compact('devices', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'device_id' => 'required|exists:devices,id',
            'user_id' => 'required|exists:users,id',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'millage_old' => 'required|integer|gte:0',
            'millage_new' => 'required|integer|gte:millage_old'
        ]);
       UserDeviceHistory::create([
            'device_id' => $request->device_id,
            'user_id' => $request->device_id,
            'created_at' => Carbon::parse($request->created_at),
            'updated_at' => Carbon::parse($request->updated_at),
            'millage_old' => $request->millage_old,
            'millage_new' => $request->millage_new,
        ]);

        return redirect()->route('histories.index')
            ->with('success', 'History created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDeviceHistory  $history
     * @return \Illuminate\Http\Response
     */
    public function show(UserDeviceHistory $history)
    {
        return view('history.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDeviceHistory  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDeviceHistory $history)
    {
        $devices = Device::all();
        $users = User::all();
        return view('history.edit', compact('history', 'devices', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDeviceHistory  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDeviceHistory $history)
    {
         $request->validate([
            'device_id' => 'required|exists:devices,id',
            'user_id' => 'required|exists:users,id',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'millage_old' => 'required|integer|gte:0',
            'millage_new' => 'required|integer|gte:millage_old'
        ]);

       $history->update([
            'device_id' => $request->device_id,
            'user_id' => $request->device_id,
            'created_at' => Carbon::parse($request->created_at),
            'updated_at' => Carbon::parse($request->updated_at),
            'millage_old' => $request->millage_old,
            'millage_new' => $request->millage_new,
        ]);

        return redirect()->route('histories.index')
            ->with('success', 'history updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDeviceHistory  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeviceHistory $history)
    {
        $history->delete();

        return redirect()->route('histories.index')
            ->with('success', 'history deleted successfully');
    }
}
