<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::latest()->paginate(5);

        return view('devices.index', compact('devices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
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
            'model' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'is_accesable' => 'required|boolean',
            'registration_number' => 'required|string|max:255',
            'millage' => 'required|integer|gte:0',
        ]); 
        Device::create([
            'model' => $request->model,
            'destination' => $request->destination,
            'serial_number' => $request->serial_number,
            'name' => $request->name,
            'is_accesable' => $request->is_accesable,
            'registration_number' => $request->registration_number,
            'millage' => $request->millage,
        ]);

        return redirect()->route('devices.index')
            ->with('success', 'device created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'is_accesable' => 'required|boolean',
            'registration_number' => 'required|string|max:255',
            'millage' => 'required|integer|gte:0',
        ]);
        $device->update($request->all());

        return redirect()->route('devices.index')
            ->with('success', 'device updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')
            ->with('success', 'device deleted successfully');
    }
}
