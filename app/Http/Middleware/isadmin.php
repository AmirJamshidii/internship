<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isadmin
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

        if (Auth::check()) {
            $id = Auth::id();
            $isadmin= DB::table('user')->where('id', $id)->get('isadmin');
                
                if($isadmin !== 1){
                    return $next($request);
                    // return redirect('dashboard');
                }
                else{
                    abort(403, 'Unauthorized action.');
                }      
        }
    }  
}
