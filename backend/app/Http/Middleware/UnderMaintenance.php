<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;

class UnderMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $getSettingValue = SiteSetting::where('meta_key', 'site_maintenance')->first()->meta_value;
        if ($getSettingValue === '1') {
            return response()->json([
                'code' => 503,
                'status' => 'site_maintenance',
                'message' => 'Under Maintenance !!'
            ]);
            // return redirect()->route('underMaintenance');
        } else {
            return $next($request);
        }
    }
}
