@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form">Create a new product</h4>
					</div>
					<p class="mb-0"></p>
				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" action="{{ route('dashboard.products.store') }}" method="POST">
                            @csrf
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> New Product Details</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Barcode</label>
											<input type="text" id="projectinput1" class="form-control" name="barcode" value="{{ old('barcode') }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">Product Name</label>
											<input type="text" id="projectinput2" class="form-control" name="name" value="{{ old('name') }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Quantity</label>
											<input type="number" id="projectinput3" class="form-control" name="quantity" value="{{ old('quantity') }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Price</label>
											<input type="number" id="projectinput4" class="form-control" name="price" value="{{ old('price') }}">
										</div>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-success">
									<i class="ft-save"></i> Save
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection