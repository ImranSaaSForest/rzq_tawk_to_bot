<?php 

namespace RZQ\TawkTo\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user) {
            $store = DB::table('stores')->where('shop_owner_id', $user->id)->first();
            if ($store && !empty($store->store_id)) {
                return $next($request);
            }
        }

        return response('Store not registered', 403);
    }
}
