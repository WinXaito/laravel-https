<?php

/**
 * @package WinXaito/laravel-https
 * @author Kevin Vuilleumier <mail@winxaito.com>
 * @copyright 2018 Kevin Vuilleumier
 * @license https://www.gnu.org/licenses/gpl.txt GNU GPL3
 * @link https://github.com/WinXaito/laravel-https
 */

namespace WinXaito\LaravelHttpsRedirect\Http\Middleware;

use Closure;

class HttpsRedirection{
    /**
     * Handle an incoming request.
     *
     * We check depending on the configuration whether or not we need
     * to redirect the user to https (Unless already in https)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!$request->secure()) {
            if(
                config('https-redirection.https_force') ||
                (!config('https-redirection.https_prohibit') &&
                    config('https-redirection.app_env') == 'production') ||
                (!config('https-redirection.https_prohibit') &&
                    !config('https-redirection.app_debug'))
            ){
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
