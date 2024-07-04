@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
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
                                    Total Bookings: {{ $totalCompletedBookings }}
                                </span>
                                <span class="ms-sm-5 ms-3 font-w500">
                                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                        <rect  width="13" height="13" fill="#6e6e6e"/>
                                    </svg>
                                    Total Sales: £{{ $totalSales }}
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

@section('scripts')
    <script>
        var activityBar1 = function(){
            var activity1 = document.getElementById("activity1");
            if (activity1 !== null) {
                activity1.height = 200;
                
                var config = {
                    type: "bar",
                    data: {
                        labels: [
                            "01",
                            "02",
                            "03",
                            "04",
                            "05",
                            "06",
                            "07",
                            "08",
                            "09",
                            "10",
                            "11",
                            "12",
                        ],
                        datasets: [
                            {
                                label: "Bookings",
                                data: [{{ implode(',', $monthlyCompletedBookings) }}],
                                borderColor: 'var(--primary)',
                                borderWidth: "0",
                                barThickness:'18',
                                backgroundColor: '#F73A0B',
                                minBarLength: 10,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins:{
                            legend: false,
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            y: {
                                grid: {
                                    color: "rgba(233,236,255,0.5)",
                                    drawBorder: true
                                },
                                ticks: {
                                    fontColor: "#6E6E6E",
                                    max: 60,
                                    min: 0,
                                    stepSize: 20
                                },
                            },
                            x: {
                                barPercentage: 0.3,
                                
                                grid: {
                                    display: false,
                                    zeroLineColor: "transparent"
                                },
                                ticks: {
                                    stepSize: 20,
                                    fontColor: "#6E6E6E",
                                    fontFamily: "Nunito, sans-serif"
                                }
                            }
                        },
                        tooltips: {
                            mode: "index",
                            intersect: false,
                            titleFontColor: "#888",
                            bodyFontColor: "#555",
                            titleFontSize: 12,
                            bodyFontSize: 15,
                            backgroundColor: "rgba(255,255,255,1)",
                            displayColors: true,
                            xPadding: 10,
                            yPadding: 7,
                            borderColor: "rgba(220, 220, 220, 1)",
                            borderWidth: 1,
                            caretSize: 6,
                            caretPadding: 10
                        }
                    }
                };

                var ctx = document.getElementById("activity1").getContext("2d");
                var myLine = new Chart(ctx, config);
            }
        }
    </script>
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