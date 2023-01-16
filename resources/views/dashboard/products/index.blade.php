@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-success">
                    <h4 class="card-title">{{ $page }}</h4>
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
                                    <td>{{ $products->firstItem() }}</td>
                                    <td>{{ $product->barcode }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td> <label class="btn {{ $product->quantity < 10 ? 'btn-outline-danger' : ($product->quantity < 20 ? 'btn-outline-warning' : 'btn-outline-success') }} btn-round btn-sm">{{ $product->quantity === 0 ? 'out of stock' : $product->quantity }}</label> </td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
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