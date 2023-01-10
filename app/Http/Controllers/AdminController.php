<?php

namespace App\Http\Controllers;

use App\Enums\PasswordEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
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

    public function storeUser(StoreUserRequest $request) : RedirectResponse
    {
        if (!User::create($request->validated())) {
        return back()->withErrors(['error' => 'something went wrong']);
        }
        return redirect()->route('dashboard.admin.users.index')->with('message', "new $request->role added");
    }

    public function toggleUserStatus(User $user) : RedirectResponse
    {
        if (!$user->update(['active' => !$user->active])) {
            return back()->withErrors(['error' => 'something went wrong']);
        }
        return back()->with('message', 'status updated');
    }

    public function editUser(User $user) : View
    {
        $roles = RoleEnum::list();
        return view('dashboard.admin.users.edit', compact('user', 'roles'));
    }

    public function updateUser(User $user, UpdateUserRequest $request) : RedirectResponse
    {
        if (!$user->update($request->validated())) {
            return redirect()->route('dashboard.admin.users.index')->withErrors(['error' => 'something went wrong']);
        }
        return redirect()->route('dashboard.admin.users.index')->with('message', 'user updated');
    }

    public function resetUserPassword(User $user) : RedirectResponse
    {
        if (!$user->update(['password' => PasswordEnum::DEFAULT])) {
            return back()->withErrors(['error' => 'something went wrong']);
        }
        return back()->with('message', 'password reset');
    }

    public function products() : View
    {
        $products = Product::paginate(10);
        return view('dashboard.admin.products.index', compact('products'));
    }

    public function createProduct() : View
    {
        return view('dashboard.admin.products.create');
    }

    public function storeProduct(StoreProductRequest $request) : RedirectResponse
    {
        if (!Product::create($request->validated())) {
            return back()->withErrors(['error' => 'something went wrong']);
        }
        return redirect()->route('dashboard.admin.products.index')->with('message', 'new product added');
    }

    public function editProduct(Product $product) : View
    {
        return view('dashboard.admin.products.edit', compact('product'));
    }

    public function updateProduct(Product $product, UpdateProductRequest $request) : RedirectResponse
    {
        if (!$product->update($request->validated())) {
            return back()->withErrors(['error' => 'something went wrong']);
        }
        return redirect()->route('dashboard.admin.products.index')->with('message', 'product updated');
    }
}
