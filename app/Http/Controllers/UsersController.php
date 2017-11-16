<?php

namespace App\Http\Controllers;

use App\Mail\UserAccountInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('admin.default_pagination_size'));

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'unique:users,email',
            'password' => 'min:6|required',
            'password_confirmation' => 'min:6|required|same:password',
            'active' => '',
            'description' => '',
            'email_welcome' => '',
        ]);

        if (empty($data['active'])) {
            $data['active'] = false;
        }

        if (! isset($data['email_welcome'])) {
            $data['email_welcome'] = false;
        }

        $password = '';

        if (! empty($data['password'])) {
            $password = $data['password'];
            $data['password'] = bcrypt($data['password']);
            unset($data['password_confirmation']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $user = new User();
        $user->fill($data);
        if ($user->save()) {
            if ($data['email_welcome']) {
                Mail::to($data['email'])->queue(new UserAccountInformation($data['email'], $password));
            }
        }

        return \Redirect::route('users.edit', [$user->id])->withSucessMessage('User has been created!');
    }

    /**
     * @param \App\User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return mixed
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'unique:users,email,'.$user->id,
            'password' => '',
            'password_confirmation' => 'same:password',
            'active' => '',
            'description' => '',
        ]);

        if (empty($data['active'])) {
            $data['active'] = false;
        }

        if (! empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
            unset($data['password_confirmation']);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $user->fill($data);
        $user->save();

        return \Redirect::route('users.edit', [$user->id])->withSucessMessage('User has been updated!');
    }

    /**
     * @param \App\User $user
     * @return mixed
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return \Redirect::route('users.index')->withSucessMessage('User has been removed!');
        } else {
            return \Redirect::route('users.edit', [$user->id])->withErrors('User could not be removed!');
        }
    }
}
