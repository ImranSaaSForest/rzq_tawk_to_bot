<?php 

namespace RZQ\TawkTo\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RZQ\TawkTo\Store\Store;

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
        $store = (object) json_decode(Store::store($request->access_store), true);

        if ($user) {
            $store = DB::table('stores')->where('shop_owner_id', $user->id)->first();
            if ($store && !empty($store->id)) {
                return $next($request);
            }
        }

        return response('Store not registered', 403);
    }
}
