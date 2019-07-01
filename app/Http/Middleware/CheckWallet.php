<?php

namespace App\Http\Middleware;

use App\Model\UserModel;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckWallet
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
        $id = Auth::id();
        if (UserModel::find($id)->connectWallet != null) {
            return redirect('user/wallet');
        }
        return $next($request);
    }
}
