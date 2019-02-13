<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class MaintenanceMode
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
      $name = DB::table('configurations') -> where('id', '=', '1');
      $config = $name->first();

      // $value = DB::table('configurations') -> where('value', '=', 'on')->get();
      if ($config->value == 'off'){
              return $next($request);
          } else {
            return redirect ('/maintenance');
          }

        return $next($request);
    }
}
