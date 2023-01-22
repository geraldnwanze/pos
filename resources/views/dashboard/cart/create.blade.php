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
						<form class="form" id="cart-form" method="POST">
                            @csrf
                            <input type="hidden" name="invoice" value="{{ $invoice }}">
							<div class="form-body">
								<h4 class="form-section">
									<i class="icon-screen-desktop"></i> Enter Barcode or Product Name</h4>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="barcode">Barcode</label>
											<input type="text" class="form-control" name="barcode" id="barcode">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="name">Product Name</label>
											<input type="text" class="form-control" name="name" id="name" list="products-list">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="quantity">Quantity</label>
											<input type="text" class="form-control" name="quantity" id="quantity" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="price">price</label>
											<input type="text" class="form-control" name="price" id="price">
										</div>
									</div>
								</div>
							</div>
                            <input type="submit" style="display: none;">
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <button class="btn btn-sm btn-info">sell</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#invoice</th>
                                    <th>product</th>
                                    <th>quantity</th>
                                    <th>&#8358; price</th>
                                    <th>total</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $cart)
                                    <tr>
                                        <td>1</td>
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

    <datalist id="products-list">
        @forelse ($products as $product)
            <option value="{{ $product->name }}">
        @empty
            <option value="no data available">
        @endforelse
    </datalist>

    <script>
        $("#cart-form").submit((e) => {
            e.preventDefault();
            return alert('submitted');
        });

        $("#name").keyup(() => {
            let searchName = $("#name").val();
            let name = "name";
            if (!searchName) {
                return;
            }
            search(name, searchName);
        });

        $("#barcode").keyup(() => {
            let searchBarcode = $("#barcode").val();
            let barcode = "barcode";
            if (!searchBarcode) {
                return;
            }
            search(barcode, searchBarcode);
        });

        function search(column, searchParam){
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.search-product') }}",
                data: {column: column, param: searchParam},
                success: (response) => {
                    if (response.length > 1) {
                        $("#barcode").val('');
                        $("#price").val('');
                        return;
                    }
                    product = response[0];
                    $("#barcode").val(product.barcode);
                    $("#price").val(product.price);
                }
            });
        }

    </script>

@endsection