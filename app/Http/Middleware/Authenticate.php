<?php

namespace App\Http\Middleware;

/*use Closure;
use App\Http\Controllers\Auth;*/


use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;
class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;


    /*public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }*/
    public function __construct()
    {
        $this->auth = Auth::owner();
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
    public function handle($request, Closure $next)
    {

        $rolesnow = 1;
        if(Auth::admin()->check())
            $rolesnow = 0;
        $roles = trim($this->getRequiredRoleForRoute($request->route()));
        $getRoles = $roles[$rolesnow];

        if($getRoles=='1'){
            return $next($request);
        }
        else{
            return View('errors.RestrictedArea');
        }

        /*if(!$this->auth->check())
        {
            return redirect()->route('auth.login')
                ->with('status', 'success')
                ->with('message', 'Please login.');
        }
//        debug($roles);
        //debug('masuk');
        if($roles == 'all')
        {
            debug('dia all');
            return $next($request);
        }
        if($roles == 'user')
        {
            debug('dia user');
            return $next($request);
        }
        if($roles == 'administrator')
        {
            debug('dia user');
            return $next($request);
        }
        else if( $this->auth->guest() || !$this->auth->user()->hasRole($roles))
        {
            debug('dia entah');
            //abort(403);
            return view('error');
            //return $next($request);
        }*/

        return $next($request);
    }
}
