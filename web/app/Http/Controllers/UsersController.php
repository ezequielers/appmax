<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->breadcrumbs = [
            trans('common.Users')
        ];
    }

    /**
     * Page to list users registered in system
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $users = User::all();
        return view('users.users', [
            'breadcrumbs' => $this->breadcrumbs,
            'users' => $users
        ]);
    }

    /**
     * Page to create a new User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create ()
    {
        $this->breadcrumbs = [trans('common.Edit Users') => route('admin.users.list')] + $this->breadcrumbs;
        $isEdit = false;
        $data = [
            'breadcrumbs' => $this->breadcrumbs,
            'user' => new User(),
            'isEdit' => $isEdit
        ];
        return view('users.usersEdit', $data);
    }

    /**
     * Page to Edit an existing User
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ($id)
    {
        $this->breadcrumbs = [trans('common.Edit Users') => route('admin.users.list')] + $this->breadcrumbs;
        $user = User::findOrFail($id);
        $isEdit = true;
        $data = [
            'breadcrumbs' => $this->breadcrumbs,
            'user' => $user,
            'isEdit' => $isEdit
        ];
        return view('users.usersEdit', $data);
    }

    /**
     * Store User
     * @param $request UserRequest
     * @return RedirectResponse
     */
    public function store (UserRequest $request)
    {
        $input = $request->all();
        $ok = User::create($input);

        return redirect()->route('admin.users.list');
    }

    /**
     * Update User
     * @param $request UserRequest
     * @return RedirectResponse
     */
    public function update (UserRequest $request, $id)
    {
        $input = $request->except('_token');
        $ok = User::whereUseId($id)->update($input);

        return redirect()->route('admin.users.list');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete ($id)
    {
        if ($id != Session::get('_user_')['use_id']) {
            $users = User::destroy($id);
        } else {
            Session::flash('user_error', trans('common.This user cannot be removed'));
        }
        return redirect()->route('admin.users.list');
    }
}
