<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;
class Login
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
        if(!session('key1')){
             $data = [
               'Jurisdiction' => "请登录！",
            ];
            return response()->success(100,'请登录！',$data);
        }else{
            $user =User::find(session('key2'));
            if(session('key1')!=$user -> token){
                $data = [
               'Jurisdiction' => "请登录！",//超级管理员
            ];
            return response()->success(100,'请登录！',$data);
            }else{
                return $next($request);
            }
        }
        
    }
}
