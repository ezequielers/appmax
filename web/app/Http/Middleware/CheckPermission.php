<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        if (Session::get('_user_')['use_type'] != 'admin') {
            $message_bag = new MessageBag();
            $message_bag-> add('checkFail', 'Você não tem permissão de acessar este recurso!');
            return redirect()->route('admin.dashboard')->withErrors($message_bag);
        }

        return $next($request);
    }
}
