<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $currentRequestedPath = $request->path();

        if(!Auth::check())
        {   
            $previousRequestedPath = session('PathName');
            
            if($currentRequestedPath != $previousRequestedPath){

                switch($currentRequestedPath){
                    case 'register':
                        $redirect_to = 'register';
                    break;

                    case 'login':
                        $redirect_to = 'login';
                    break;

                    default:
                       $redirect_to = 'login';
                       $currentRequestedPath = '';
                }

                session()->put('PathName' , $currentRequestedPath);
                return redirect($redirect_to);
            }
           
        }else{
            
            $PathsRl = array('login' , 'register');

            if(in_array($currentRequestedPath , $PathsRl))
            {
                return redirect('/index');
            }
        }
        return $next($request);
    }
}
