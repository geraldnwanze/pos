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
                <div class="px-3 pt-3">
                    <a href="{{ route('dashboard.products.index') }}" class="btn btn-sm btn-primary">view all products</a>
                    <a href="{{ route('dashboard.products.index', ['status' => 'below-20']) }}" class="btn btn-sm btn-warning">view products less than 20</a>
                    <a href="{{ route('dashboard.products.index', ['status' => 'below-10']) }}" class="btn btn-sm btn-danger">view products less than 10</a>
                    <a href="{{ route('dashboard.products.index', ['status' => 'out-of-stock']) }}" class="btn btn-sm btn-danger">view out of stock products</a>
                    <form class="form" id="product-search-form">
                        
                        <div class="form-body">
                            <h4 class="form-section">
                                <i class="icon-screen-desktop"></i> Search For Product
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Type to search</label>
                                        <input type="text" class="form-control" id="product-search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#default" title="restock"><i class="ft-rotate-ccw"></i></button>

                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" form="delete-product-{{ $product->id }}" title="delete"><i class="fa fa-trash"></i></button>
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
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <h5>Check First Paragraph</h5>
      <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie chocolate cake liquorice. Apple pie sugar plum powder donut soufflé.</p>
      <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake chocolate bar ice cream. Danish candy cake.</p>
      <hr>
      <h5>Some More Text</h5>
      <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly. Tootsie roll bonbon toffee danish. Biscuit sweet cake gummies danish. Tootsie roll cotton candy tiramisu lollipop candy cookie biscuit pie.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-outline-primary">Save changes</button>
      </div>
    </div>
    </div>
  </div>


<script>
    $('#product-search-form').submit((e) => {
        e.preventDefault();
    })

    $('#product-search').keyup(() => {
        let value = $('#product-search').val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('products/search')}}',
            data:{'search':value},
            success:function(data){
                // $('tbody').html(data);
                console.log(data);
            }
        });
    });
</script>

@endsection