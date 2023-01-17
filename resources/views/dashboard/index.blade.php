@extends('layouts.dashboard')

@section('content')
<!--Statistics cards Starts-->
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card bg-white">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body text-left">
                            <h4 class="font-medium-5 card-title mb-0">{{ number_format($products) }}</h4>
                            <span>Products</span>
                        </div>
                        <div class="media-right text-right">
                            <i class="icon-basket-loaded font-large-1 red"></i>
                        </div>
                    </div>
                </div>
                <div id="widget-line-area" class="height-150 WidgetAreaChart WidgetAreaChart1 WidgetAreaChartshadow mb-2">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card bg-white">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body text-left">
                            <h4 class="font-medium-5 card-title mb-0">{{ number_format($owners) }}</h4>
                            <span>Owners</span>
                        </div>
                        <div class="media-right text-right">
                            <i class="icon-users font-large-1 purple"></i>
                        </div>
                    </div>
                </div>
                <div id="widget-line-area2" class="height-150 WidgetAreaChart WidgetAreaChart2 WidgetAreaChartshadow mb-2">
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card bg-white">
            <div class="card-body">
                <div class="card-block pt-2 pb-0">
                    <div class="media">
                        <div class="media-body text-left">
                            <h4 class="font-medium-5 card-title mb-0">{{ number_format($staffs) }}</h4>
                            <span>Staffs</span>
                        </div>
                        <div class="media-right text-right">
                            <i class="icon-users font-large-1 blue"></i>
                        </div>
                    </div>
                </div>
                <div id="widget-line-area3" class="height-150 WidgetAreaChart WidgetAreaChart3 WidgetAreaChartshadow mb-2">
                </div>
            </div>
        </div>
    </div>
</div>
<!--Statistics cards Ends-->

<!-- Table -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-warning">
                    <h4 class="card-title">Recent Sales Record</h4>
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recent_sales as $sales)
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