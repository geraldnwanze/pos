<?php

namespace App\Http\Controllers;

use App\Enums\PasswordEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        view()->share('page', 'Users');
    }
    public function index() : View
    {
        $users = User::list()->paginate();
        return view('dashboard.users.index', compact('users'));
    }

    public function create() : View
    {
        $roles = RoleEnum::list();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request) : RedirectResponse
    {
        if (!User::create($request->validated())) {
        return back()->with('error', 'something went wrong');
        }
        return redirect()->route('dashboard.users.index')->with('message', "new $request->role added");
    }

    public function toggleStatus(User $user) : RedirectResponse
    {
        if (!$user->update(['active' => !$user->active])) {
            return back()->with('error', 'something went wrong');
        }
        return back()->with('success', 'status updated');
    }

    public function edit(User $user) : View
    {
        $roles = RoleEnum::list();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UpdateUserRequest $request) : RedirectResponse
    {
        if (!$user->update($request->validated())) {
            return redirect()->route('dashboard.users.index')->withErrors(['error' => 'something went wrong']);
        }
        return redirect()->route('dashboard.users.index')->with('message', 'user updated');
    }

    public function resetPassword(User $user) : RedirectResponse
    {
        if (!$user->update(['password' => PasswordEnum::DEFAULT])) {
            return back()->with('error', 'something went wrong');
        }
        return back()->with('success', 'password reset');
    }

    public function destroy(User $user)
    {
        if (!$user->delete()) {
            return back()->with('error', 'something went wrong');
        }
        return back()->with('success', 'user deleted');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
