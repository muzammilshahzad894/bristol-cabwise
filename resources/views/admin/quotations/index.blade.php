@extends('layouts.admin.app')


@section('content')
<div class="container-fluid">


    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone </th>
                            <th>Pickup </th>
                            <th>Postcode </th>
                            <th>Pickup City/town</th>
                            <th>DropOff </th>
                            <th>Postcode </th>
                            <th>DropOff City/town</th>
                            <th>Date & time</th>
                            <th>Fleet</th>
                            <th>Return</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($quotations->count())
                            @foreach($quotations as $quote)
                                <tr>
                                    <td>{{ $quote->fullname }}</td>
                                    <td>{{ $quote->email }}</td>
                                    <td>{{ $quote->phone }}</td>
                                    <td> <div class="max-content-display">{{ $quote->pickup }}</div></td>
                                    <td> <div class="max-content-display">{{ $quote->pickup_postal_code }}</div></td>
                                    <td> <div class="max-content-display">{{ $quote->pickup_city }}</div></td>
                                    <td> <div class="max-content-display">{{$quote->dropoff}}</div></td>
                                    <td> <div class="max-content-display">{{ $quote->dropoff_postal_code }}</div></td>
                                    <td> <div class="max-content-display">{{ $quote->dropoff_city }}</div></td>
                                    <td>{{ $quote->date_time }}</td>

                                    <td>
                                        {{ $quote->fleet->name }}
                                    </td>
                                    <td>
                                        @if($quote->return_journey == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $quotations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .filters-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-item {
            flex: 0 0 150px;
        }

        .filter-item label {
            display: block;
            margin-bottom: 5px;
        }

        .filter-item input,
        .filter-item select {
            width: 100%;
        }

        .filter-item button {
            width: 100%;
        }

        @media (max-width: 350px) {
            .filter-item {
                flex: 1 1 100%;
            }

            .filter-item button {
                margin-top: 10px;
            }
        }
    </style>
@endsection
