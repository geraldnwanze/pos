<?php

namespace App\Http\Controllers;

use App\Enums\PasswordEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index() : View
    {
        $products = Product::count();
        $owners = User::owners()->count();
        $staffs = User::staffs()->count();
        $recent_sales = [];
        return view('dashboard.index', compact('products', 'owners', 'staffs', 'recent_sales'));
    }
}
