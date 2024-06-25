<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Session;

class cekLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get('cek') == NULL){
            alert()->error('Stop!','Anda harus login terlebih dahulu');
            return redirect('login');
        }
        if (Session::get('cek')[0] > 0){
            return $next($request);
        }
    }
}
