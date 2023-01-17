@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Edit a product</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="{{ route('dashboard.products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> Edit Product</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Barcode</label>
											<input type="text" id="projectinput1" class="form-control" name="barcode" value="{{ $product->barcode }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">Product Name</label>
											<input type="text" id="projectinput2" class="form-control" name="name" value="{{ $product->name }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Quantity</label>
											<input type="number" id="projectinput3" class="form-control" name="quantity" value="{{ $product->quantity }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Price</label>
											<input type="number" id="projectinput4" class="form-control" name="price" value="{{ $product->price }}">
										</div>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-success">
									<i class="ft-save"></i> Update
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection