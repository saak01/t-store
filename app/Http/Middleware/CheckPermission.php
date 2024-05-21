<?php

namespace App\Http\Middleware;

use App\Models\Route;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
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
        $requestRoute = $request->route();
        $requestRolePermission = $requestRoute->getAction('role');
        if($requestRolePermission){
            $route = Route::where('key',$requestRolePermission)->first();
            if($route){
                $userGroup = $request->user()->group;
                $userHasPermission = $userGroup->routes->contains('id',$route->id);
                if(!$userHasPermission){
                    return back()->withErrors(['erro' => 'Usuário sem permissão para adicionar novas Tshirts']);
                }
            }
        }
        return $next($request);
    }
}
