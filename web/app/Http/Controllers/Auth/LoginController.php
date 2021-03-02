<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\UsersService;
//use http\Client\Curl\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
//use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Render Login. Case user is loged redirect to Dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index ()
    {
        if (Session::has('_user_')) {
            return redirect()->route('admin.dashboard');
            // return redirect()->intended('dashboard');
        } else {
            return view('auth.login', []);
        }
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  LoginRequest  $request
     * @param  MessageBag  $message_bag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function login (LoginRequest $request, MessageBag $message_bag)
    {
        $validated = $request->validated();
        if ($validated) {
            $user = UsersService::validateLogin($request->all());

            if ($user) {
                Session::put('_user_', $user->toArray()[0]);
                return redirect()->route('admin.dashboard');
            } else {
                $message_bag-> add('loginFail', 'Usuário ou Senha incorretos!');
                return redirect()->route('admin.auth.login')->withErrors($message_bag);
            }
        }
    }

    /**
     * Logout System
     * @return Redirect
     */
    public function logout () {
        Session::flush();
        return redirect()->route('admin.auth.login');
    }
}
