@extends('layouts.dasboard')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="col-8">
            <div class="col-11 mx-4 px-4  bg-white shadow-sm">
                <div class="col-12 border-bottom fs-5 py-3 mb-3">Revenue Analytics</div>
                <revenue-analytics-chart />
            </div>
        </div>

        <div class="col-4">
            <div class="col-11 mx-1 px-4  bg-white shadow-sm">
                <div class="col-12 border-bottom fs-5 py-3 mb-3">Profit Earned</div>
                <profit-earned />
            </div>
            <div class="col-11 mx-1 px-4  bg-white shadow-sm pt-3">
                <div class="col-12 border-bottom fs-5 py-3 mb-3">Recent Orders</div>
                <recent-orders />
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center mx-4">
        <div class="col-12 bg-white shadow-sm my-4 px-4 py-4">
            <products-list />
        </div>
    </div>
@endsection
