<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request as Request;

class ProductController extends Controller
{

    public function __construct()
    {
        view()->share('page', 'Products');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request()->query('status');
        if ($query === 'out-of-stock') {
            $products = Product::where('quantity', 0)->orderBy('name', 'asc')->paginate(10);
        } else if ($query === 'below-10') {
            $products = Product::where('quantity', '<', '10')->where('quantity', '>', '0')->orderBy('name', 'asc')->paginate(10);
        } else if ($query === 'below-20') {
            $products = Product::where('quantity', '<', '20')->where('quantity', '>=', '10')->orderBy('name', 'asc')->paginate(10);
        } else {
            $products = Product::orderBy('name', 'asc')->paginate(10);
        }
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if (!Product::create($request->validated())) {
            return back()->with('error', 'something went wrong');
        }
        return redirect()->route('dashboard.products.index')->with('success', 'new product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (!$product->update($request->validated())) {
            return back()->with('error', 'something went wrong');
        }
        return redirect()->route('dashboard.products.index')->with('success', 'product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        if (!$product->delete()) {
            return back()->with('error', 'something went wrong');
        }

        $paginator = Product::paginate(10, columns: ['id']);
        $redirectToPage = ($request->page <= $paginator->lastPage()) ? $request->page : $paginator->lastPage();
        return redirect()->route('dashboard.products.index', ['page' => $redirectToPage])->with('success', 'product deleted');
    }

    public function search(Request $request)
    {
        dd($request);
    }
}
