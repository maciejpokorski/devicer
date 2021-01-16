<?php

namespace App\Http\Controllers;

use App\Models\UserDeviceHistory;
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

        return view('history.index', compact('hisotry'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDeviceHistory  $userDeviceHistory
     * @return \Illuminate\Http\Response
     */
    public function show(UserDeviceHistory $userDeviceHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDeviceHistory  $userDeviceHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDeviceHistory $userDeviceHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDeviceHistory  $userDeviceHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDeviceHistory $userDeviceHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDeviceHistory  $userDeviceHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeviceHistory $userDeviceHistory)
    {
        //
    }
}
