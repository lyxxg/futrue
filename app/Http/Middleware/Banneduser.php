<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Banneduser
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
        $banneds=\App\Models\Banneduser::all();
        //被关进小黑屋的用户
        $bannedarr=[];
        foreach ($banneds as $banned){
            array_push($bannedarr,$banned->user_id);
        }

        $user_id=Auth::id();
        if(in_array($user_id,$bannedarr)){
            return redirect('banneduser');
        }

        return $next($request);
    }
}
