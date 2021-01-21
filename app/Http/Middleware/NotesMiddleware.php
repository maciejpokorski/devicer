<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class NotesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user() || ($request->note && $request->note->history->user->id != Auth::user()->id && !$request->is('notes/create') && !Auth::user()->is_admin))
        {
            return redirect(RouteServiceProvider::HOME)->with('success', 'Only for owner');
        }

        return $next($request);
    }
}
