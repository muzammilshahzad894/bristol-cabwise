@extends('layouts.admin.app')

@section('styles')
    <style>
        .tax-row {
            border: 2px solid #F89723;
            padding: 3px;
            border-radius: 8px;
            margin-bottom: 13px;
        }

        .btn-primary {
            padding: 0.625rem 1rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.messages')
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Fleet</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.fleets.update', $fleet->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            value="{{ $fleet->name }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">About Car <span class="text-danger">*</span></label>
                                        <input type="text" name="about_car" class="form-control" placeholder="About Car"
                                            value="{{ $fleet->about_car }}" required>
                                        @error('about_car')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Image"
                                            value="{{ $fleet->image }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Passengers <span class="text-danger">*</span></label>
                                        <input type="number" name="max_passengers" class="form-control"
                                            placeholder="Max Passengers" value="{{ $fleet->max_passengers }}" required>
                                        @error('max_passengers')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Suitecases <span class="text-danger">*</span></label>
                                        <input type="number" name="max_suitecases" class="form-control"
                                            placeholder="Max Suitecases" value="{{ $fleet->max_suitecases }}" required>
                                        @error('max_suitecases')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Max Hand Luggage <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="max_hand_luggage" class="form-control"
                                            placeholder="Max Hand Luggage" value="{{ $fleet->max_hand_luggage }}" required>
                                        @error('max_hand_luggage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price / mile <span class="text-danger">*</span></label>
                                        <input type="text" name="price" class="form-control" placeholder="Price"
                                        value="{{ $fleet->price }}" oninput="validateDecimal(this)" required>
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Minimum Booking Price <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="min_booking_price" class="form-control"
                                            placeholder="Minimum Booking Price" value="{{ $fleet->min_booking_price }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('min_booking_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 10 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_10_miles" class="form-control"
                                            placeholder="Price after 10 miles" value="{{ $fleet->price_after_10_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_10_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 20 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_20_miles" class="form-control"
                                            placeholder="Price after 20 miles" value="{{ $fleet->price_after_20_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_20_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 30 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_30_miles" class="form-control"
                                            placeholder="Price after 30 miles" value="{{ $fleet->price_after_30_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_30_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 40 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_40_miles" class="form-control"
                                            placeholder="Price after 40 miles" value="{{ $fleet->price_after_40_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_40_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 50 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_50_miles" class="form-control"
                                            placeholder="Price after 50 miles" value="{{ $fleet->price_after_50_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_50_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 60 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_60_miles" class="form-control"
                                            placeholder="Price after 60 miles" value="{{ $fleet->price_after_60_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_60_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 70 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_70_miles" class="form-control"
                                            placeholder="Price after 70 miles" value="{{ $fleet->price_after_70_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_70_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 80 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_80_miles" class="form-control"
                                            placeholder="Price after 80 miles" value="{{ $fleet->price_after_80_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_80_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 90 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_90_miles" class="form-control"
                                            placeholder="Price after 90 miles" value="{{ $fleet->price_after_90_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_90_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 100 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_100_miles" class="form-control"
                                            placeholder="Price after 100 miles" value="{{ $fleet->price_after_100_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_100_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 110 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_110_miles" class="form-control"
                                            placeholder="Price after 110 miles" value="{{ $fleet->price_after_110_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_110_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 120 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_120_miles" class="form-control"
                                            placeholder="Price after 120 miles" value="{{ $fleet->price_after_120_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_120_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 130 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_130_miles" class="form-control"
                                            placeholder="Price after 130 miles" value="{{ $fleet->price_after_130_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_130_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 140 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_140_miles" class="form-control"
                                            placeholder="Price after 140 miles" value="{{ $fleet->price_after_140_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_140_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 150 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="price_after_150_miles" class="form-control"
                                            placeholder="Price after 150 miles" value="{{ $fleet->price_after_150_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('price_after_150_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Rates for Airport Transfers Service -->
                                    <div class="mb-3 col-md-12">
                                        <h4 class="card-title">Rates for Airport Transfers Service</h4>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 10 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_10_miles" class="form-control"
                                            placeholder="Price after 10 miles"
                                            value="{{ $fleet->airport_price_after_10_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_10_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 20 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_20_miles" class="form-control"
                                            placeholder="Price after 20 miles"
                                            value="{{ $fleet->airport_price_after_20_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_20_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 30 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_30_miles" class="form-control"
                                            placeholder="Price after 30 miles"
                                            value="{{ $fleet->airport_price_after_30_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_30_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 40 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_40_miles" class="form-control"
                                            placeholder="Price after 40 miles"
                                            value="{{ $fleet->airport_price_after_40_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_40_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 50 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_50_miles" class="form-control"
                                            placeholder="Price after 50 miles"
                                            value="{{ $fleet->airport_price_after_50_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_50_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 60 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_60_miles" class="form-control"
                                            placeholder="Price after 60 miles"
                                            value="{{ $fleet->airport_price_after_60_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_60_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 70 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_70_miles" class="form-control"
                                            placeholder="Price after 70 miles"
                                            value="{{ $fleet->airport_price_after_70_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_70_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 80 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_80_miles" class="form-control"
                                            placeholder="Price after 80 miles"
                                            value="{{ $fleet->airport_price_after_80_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_80_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 90 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_90_miles" class="form-control"
                                            placeholder="Price after 90 miles"
                                            value="{{ $fleet->airport_price_after_90_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_90_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 100 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_100_miles" class="form-control"
                                            placeholder="Price after 100 miles"
                                            value="{{ $fleet->airport_price_after_100_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_100_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 110 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_110_miles" class="form-control"
                                            placeholder="Price after 110 miles"
                                            value="{{ $fleet->airport_price_after_110_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_110_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 120 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_120_miles" class="form-control"
                                            placeholder="Price after 120 miles"
                                            value="{{ $fleet->airport_price_after_120_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_120_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 130 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_130_miles" class="form-control"
                                            placeholder="Price after 130 miles"
                                            value="{{ $fleet->airport_price_after_130_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_130_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 140 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_140_miles" class="form-control"
                                            placeholder="Price after 140 miles"
                                            value="{{ $fleet->airport_price_after_140_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_140_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Price after 150 miles <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="airport_price_after_150_miles" class="form-control"
                                            placeholder="Price after 150 miles"
                                            value="{{ $fleet->airport_price_after_150_miles }}"
                                            oninput="validateDecimal(this)" required>
                                        @error('airport_price_after_150_miles')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Detail Page Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="detail_page_description" class="form-control" rows="5" placeholder="Detail Page Description" required>{{ old('detail_page_description') ?? $fleet->detail_page_description }}
                                        </textarea>
                                        @error('detail_page_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <!-- Tax fields section -->
                                    <h4>Tax Section</h4>
                                    <div id="taxes-section">
                                        @foreach ($fleetTaxes as $index => $tax)
                                            <div class="tax-row row">
                                                <div class="mb-3 col-md-5">
                                                    <label class="form-label">Tax Name</label>
                                                    <input type="text" name="taxes[{{ $index }}][name]"
                                                        class="form-control" placeholder="Tax Name"
                                                        value="{{ $tax->name }}">
                                                </div>
                                                <div class="mb-3 col-md-5">
                                                    <label class="form-label">Tax Price</label>
                                                    <input type="text" name="taxes[{{ $index }}][price]"
                                                        class="form-control" placeholder="Tax Price"
                                                        value="{{ $tax->price }}"
                                                        oninput="validateDecimal(this)">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger mt-4"
                                                        onclick="removeTaxRow(this)">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success mb-3" onclick="addTaxRow()">Add
                                            Tax</button>
                                    </div>
                                    <hr>
                                    <!-- End tax fields section -->
                                    <!-- Meet and Greet Section -->
                                    {{-- <h4>Meet and Greet</h4>
                                <div class="mb-3 col-md-6">
                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="meetAndGreetCheckbox" name="meet_and_greet" {{ $fleet->meet_and_greet ? 'checked' : '' }}>
                                        <label class="form-check-label" for="meetAndGreetCheckbox">Meet and Greet</label>
                                    </div>
                                    <div id="meet_greet_price_sec" style="{{ $fleet->meet_and_greet ? '' : 'display: none;' }}">
                                        <label class="form-label">Price <span class="text-danger">*</span></label>
                                        <input type="number" name="meet_and_greet_price" class="form-control" placeholder="Meet and Greet Price" value="{{ $fleet->meet_and_greet_price }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('meet_and_greet_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                    <!-- End Meet and Greet Section -->
                                    <hr>
                                    <!-- Features Section -->

                                    <h4>Features</h4>
                                    <div class="mb-3">
                                        <input type="text" data-role="tagsinput" name="features" class="form-control"
                                            placeholder="Add Features" value="{{ old('features') ?? $fleet->features }}">
                                        @error('detail_page_features')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let taxIndex = {{ count($fleetTaxes) }};

        function addTaxRow() {
            const taxSection = document.getElementById('taxes-section');
            const newTaxRow = document.createElement('div');
            newTaxRow.classList.add('tax-row', 'row');

            newTaxRow.innerHTML = `
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Name</label>
                <input type="text" name="taxes[${taxIndex}][name]" class="form-control" placeholder="Tax Name">
            </div>
            <div class="mb-3 col-md-5">
                <label class="form-label">Tax Price</label>
                <input type="text" name="taxes[${taxIndex}][price]" class="form-control" placeholder="Tax Price" oninput="validateDecimal(this)">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger mt-4" onclick="removeTaxRow(this)">Remove</button>
            </div>
        `;
            taxSection.appendChild(newTaxRow);
            taxIndex++;
        }

        function removeTaxRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }

        document.getElementById('meetAndGreetCheckbox').addEventListener('change', function() {
            const meetGreetPriceSec = document.getElementById('meet_greet_price_sec');
            meetGreetPriceSec.style.display = this.checked ? '' : 'none';
        });

        function validateDecimal(input) {
            // Remove any non-numeric characters except for a dot
            let value = input.value.replace(/[^0-9.]/g, '');

            // Ensure only one dot is allowed
            const dotIndex = value.indexOf('.');
            if (dotIndex !== -1) {
                value = value.slice(0, dotIndex + 1) + value.slice(dotIndex + 1).replace(/\./g, '');
            }

            // Update the input field value
            input.value = value;
        }
    </script>
@endsection
