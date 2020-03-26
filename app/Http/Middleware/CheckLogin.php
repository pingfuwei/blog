<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
//        session(["name"=>"哈喽"]);
        $SESSIONInfo=$request->session()->get("name");

//        dd($SESSIONInfo);
        if(!$SESSIONInfo){
            $admin_user=$request->cookie("admin_user");
            if($admin_user){
                session(["name"=>$admin_user]);
                $request->session()->save();
            }else{
                return redirect("/login/login");
            }
        }
        return $next($request);
    }
}
