@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Search Product</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="#" method="POST">
                            @csrf
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> Enter Barcode or Product Name</h4>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="barcode">Barcode</label>
											<input type="text" class="form-control" name="barcode" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="name">Product Name</label>
											<input type="text" class="form-control" name="name" list="products">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="quantity">Quantity</label>
											<input type="text" class="form-control" name="quantity" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="price">price</label>
											<input type="text" class="form-control" name="#" >
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>

    <datalist id="products">
        @forelse ($products as $product)
            <option value="{{ $product->name }}">
        @empty
            <option value="no data available">
        @endforelse
    </datalist>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
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
                                @forelse ($carts as $cart)
                                    <tr>
                                        <td>{{ $carts->firstItem() + $loop->index }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">no data in cart</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection