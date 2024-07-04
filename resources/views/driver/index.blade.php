@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                {{-- <div class="card">
                <div class="card-body"> --}}
                <div class="row separate-row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="job-icon pb-4 d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <h2 class="mb-0 lh-1">{{ $todayPendingBookings }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Today Pending Bookings</span>
                                    </div>
                                    <i class="fa fa-car pending-bookings" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="job-icon pb-4 pt-4 pt-sm-0 d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <h2 class="mb-0 lh-1">{{ $todayInprogressBookings }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Today Inprogress Bookings</span>
                                    </div>
                                    <i class="fa fa-car inprogress-bookings" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="job-icon pb-4 d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <h2 class="mb-0 lh-1">{{ $todayCompletedBookings }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Today Completed Rides</span>
                                    </div>
                                    <i class="fa fa-car completed-bookings" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="job-icon pb-4 d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <h2 class="mb-0 lh-1">{{ $upcomingBookings }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Upcoming Bookings</span>
                                    </div>
                                    <i class="fa fa-car pending-bookings" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .pending-bookings {
            color: #F93A0B;
            font-size: xx-large;
        }
        .inprogress-bookings {
            color: #3385D6;
            font-size: xx-large;
        }
        .completed-bookings {
            color: #2ECC71;
            font-size: xx-large;
        }
    </style>
@endsection
