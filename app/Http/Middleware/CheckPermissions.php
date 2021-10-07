<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $page_id, ...$guards)
    {

        $user = Auth::guard($guards)->user();

        $role_id = $user->role_id;
        $role = Roles::where('id', $role_id)->first();
        $page_id_list = explode(',', $role->page_id);


        if (in_array($page_id, $page_id_list) or $role->page_id == null) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
