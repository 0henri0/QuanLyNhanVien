<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check = app()->make(\App\Service\Interfaces\TimesheetInterface::class)->find($request->route('id'));

        if (!$check||$check->staff_id!=Auth::guard()->user()->id) {

            return redirect('/leader')->with('notify', 'bạn không phải leader của timesheet.');
        }

        return $next($request);
    }
}
