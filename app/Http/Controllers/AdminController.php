<?php

namespace App\Http\Controllers;

use App\Enums\PasswordEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\ActivateDeactivateUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index() : View
    {
        return view('dashboard.admin.index');
    }

    public function users() : View
    {
        $staffs = User::staffs()->get();
        $owners = User::owners()->get();
        return view('dashboard.admin.users.index', compact('staffs', 'owners'));
    }

    public function createUser() : View
    {
        $roles = RoleEnum::list();
        return view('dashboard.admin.users.create', compact('roles'));
    }

    public function storeUser(StoreUserRequest $request)
    {
        if (!User::create($request->validated())) {
        return back()->withErrors(['error' => 'an error occurred please try again later.']);
        }
        return redirect()->route('dashboard.admin.users.index')->with('message', "new $request->role added");
    }

    public function toggleUserStatus(User $user)
    {
        $user->update(['active' => !$user->active]);
        return back()->with('message', 'status updated');
    }
}
