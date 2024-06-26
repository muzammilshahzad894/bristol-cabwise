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
                                            <h2 class="mb-0 lh-1">{{ $totalServices }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Pending Rides</span>
                                    </div>
                                    <div id="NewCustomers"></div>
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
                                            <h2 class="mb-0 lh-1">{{ $totalFleets }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Inprogress Rides</span>
                                    </div>
                                    <div id="NewCustomers1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="job-icon pt-4 pb-sm-0 pb-4 pe-3 d-flex justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <h2 class="mb-0 lh-1">{{ $totalDrivers }}</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Completed Rides</span>
                                    </div>
                                    <div id="NewCustomers2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card" id="user-activity1">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20 mb-0">Sales</h4>
                                <div class="card-action coin-tabs  mt-0">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#Daily1" role="tab">Daily</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#Daily1" role="tab" >Weekly</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Daily1" role="tab" >Monthly</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="me-sm-5 me-3 font-w500">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                        <rect  width="13" height="13" fill="#f73a0b"/>
                                    </svg>
                                    Total Bookings: 1000
                                </span>
                                <span class="ms-sm-5 ms-3 font-w500">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                        <rect  width="13" height="13" fill="#6e6e6e"/>
                                    </svg>
                                    Total Sales: £5000
                                </span>
                                <div class="tab-content mt-5" id="myTabContent">
                                    <div class="tab-pane fade show active" id="monthly1">
                                        <canvas id="activity1" class="chartjs"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
