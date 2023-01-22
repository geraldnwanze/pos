@extends('layouts.dashboard')

@section('content')
    <!-- Table -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-warning">
                    <h4 class="card-title">Sales Records</h4>
                </div>
                <div class="pt-3 px-3">
                    <form class="form" id="product-search-form">
                        
                        <div class="form-body">
                            <h4 class="form-section">
                                <i class="icon-screen-desktop"></i> Search For Record
                            </h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Invoice</label>
                                        <input type="number" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Product</label>
                                        <input type="text" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">From</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">To</label>
                                        <input type="date" class="form-control" name="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0"># Invoice</th>                                
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Quantity</th>
                                    <th class="border-top-0">price</th>
                                    <th class="border-top-0">Amount</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $sales)
                                    <tr>
                                      <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                      <td colspan="100%">no data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection