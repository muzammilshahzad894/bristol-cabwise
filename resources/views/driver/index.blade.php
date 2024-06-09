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
                                            <h2 class="mb-0 lh-1">4</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Total Bookings</span>
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
                                            <h2 class="mb-0 lh-1">4</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Pending</span>
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
                                            <h2 class="mb-0 lh-1">100</h2>
                                        </div>
                                        <span class="fs-14 d-block mb-2">Completed</span>
                                    </div>
                                    <div id="NewCustomers2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
