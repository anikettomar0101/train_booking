@extends('layouts.main')
<style>
    .center-row {
        text-align: center;
    }

    .center-row a {
        color: #EFEFEF;
        font-size: 22px;
    }
    .center-row a:hover {
        color: #FFF;
        border-bottom:1px solid #FFF;
    }
</style>

@section('content')
    <div class="row center-row" style="margin-top: 64px;">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3"">
                <div class="card-body" style="padding-right:50%;">
                    <a href="{{ route('create-booking') }}" > Create Booking </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3" >
                <div class="card-body" style="padding-right:50%;">
                <a href="{{ route('all-bookings') }}" > All Bookings </a>
                </div>
            </div>
        </div>
    </div>
@stop