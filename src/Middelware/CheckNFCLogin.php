<?php

namespace MabenDev\NFCLogin\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class CheckPermission
 * @package MabenDev\Permissions\Middleware
 *
 * @author Michael Aben <michael@atention.nl>
 */
class CheckNFCLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  string  $permission
     *
     * @return mixed
     */
    public function handle($request, Closure $next, string $permission)
    {
        if($request->get('NFC_LOGIN') !== true) return redirect()->route('NFC_LOGIN');

        return $next($request);
    }
}
