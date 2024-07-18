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
     
        if ($request->access_store) {
            $exists = DB::table('product_chat_settings')
                ->where('store_id', $request->access_store)
                ->exists();

            if (!$exists) {
                DB::table('product_chat_settings')->insert([
                    'store_id' => $request->access_store,
                    'tawk_to_enabled' => false
                ]);
            }
        }
        if ($user) {
            $store = DB::table('stores')->where('shop_owner_id', $user->id)->first();
            if ($store && !empty($store->id)) {
                return $next($request);
            }
        }
        return $next($request);
        // return response('Store not registered', 403);
    }
}

