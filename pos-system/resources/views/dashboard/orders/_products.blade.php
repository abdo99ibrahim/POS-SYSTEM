<div id="print-area">
    {{-- <div class="row">
        <div class="col-sm-6">
            <h6>@lang('site.user') : <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </span></h6>
        </div>
        <div class="col-sm-6">
            <h6>@lang('site.prand') : POS-Sales </span></h6>
        </div>
    </div> --}}
    <table class="table table-hover table-bordered">

        <thead>
        <tr>
            <th>@lang('site.name')</th>
            <th>@lang('site.quantity')</th>
            <th>@lang('site.price')</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ number_format($product->pivot->quantity * $product->sale_price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3>@lang('site.total') <span>{{ number_format($order->total_price, 2) }}</span></h3>

</div>

<button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('site.print')</button>

