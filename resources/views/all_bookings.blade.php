@extends('layouts.main')


@section('content')
<style>
    .header-row {
        border-bottom: 2px solid #ccc;
        font-weight: 600;
        background: #EFEFEF;
        padding-top: 12px;
        padding-bottom: 12px;
    }
    .data-row {
        border-bottom: 1px solid #ccc;
    }
    .data-row:last-child {
        border-bottom:none;
    }
    .data-row div.col {
        padding-top: 8px;
        padding-bottom: 4px;
    }

</style>

    <div class="card" style="margin-top: 64px;">
        <div class="card-header">
            All Bookings
        </div>
        <div class="card-body">
            <div class="row row-cols-4 header-row">
                    <div class="col-md-1"> Seat # </div>
                    <div class="col-md-6"> Booking Id </div>
                    <div class="col-md-3"> Booking Time </div>
                    <div class="col-md-2"> Booked By </div>
                </div>
            @foreach($data as $item)

                <div class="row row-cols-4 data-row">
                    <div class="col col-md-1">{{$coach->name}}{{$item->seat_no}}</div>
                    <div class="col col-md-6">{{ $item->booking_id }}</div>
                    <div class="col col-md-3">{{ $item->created_at }}</div>
                    <div class="col col-md-2">{{ $item->phone }}</div>
                </div>
            @endforeach
        </div>
    </div>
@stop