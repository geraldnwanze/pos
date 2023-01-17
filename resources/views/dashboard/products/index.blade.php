@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-success">
                    <h4 class="card-title">{{ $page }}</h4>
                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary pull-right">create product</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>barcode</th>
                                <th>name</th>
                                <th>quantity</th>
                                <th>&#8358; price</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $loop->index }}</td>
                                    <td>{{ $product->barcode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td> <label class="btn {{ $product->quantity < 10 ? 'btn-outline-danger' : ($product->quantity < 20 ? 'btn-outline-warning' : 'btn-outline-success') }} btn-round btn-sm">{{ $product->quantity === 0 ? 'out of stock' : $product->quantity }}</label> </td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" form="delete-product-{{ $product->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post" id="delete-product-{{ $product->id }}">
                                    <input type="hidden" name="page" value="{{ $products->currentPage() }}">
                                        @csrf
                                    @method('DELETE')
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection